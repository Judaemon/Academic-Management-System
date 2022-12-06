<?php

namespace App\Http\Livewire\Payments;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

use App\Models\AcademicYear;
use App\Models\Payments;
use App\Models\User;
use App\Models\Setting;

use App\Exports\PaymentsExport;
use App\Notifications\PaymentNotification;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;

use WireUi\Traits\Actions;
use Twilio\Rest\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Notification;

use Auth;

class PaymentsTable extends DataTableComponent
{
    use AuthorizesRequests, Actions;

    protected $model = Payments::class;

    public array $bulkActions = [
        'exportXLSX' => 'Export as XLSX',
        'exportCSV' => 'Export as CSV',
        'exportPDF' => 'Export as PDF',
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setThAttributes(function (Column $column) {
            if ($column->isField('payment_status')) {
                return ['class' => 'flex justify-center mt-1',];
            }
            return ['class' => 'text-center',];
        });
    }

    public function exportXLSX()
    {
        $payments = $this->getSelected();

        if (!empty($payments)) {
            $this->clearSelected();
            return Excel::download(new PaymentsExport($payments), 'payments.xlsx');
        } else {
            $this->dialog()->error(
                $title = 'No Payments Selected',
                $description = "Please select which payments to export",
            );
        }
    }

    public function exportCSV()
    {
        $payments = $this->getSelected();

        if (!empty($payments)) {
            $this->clearSelected();
            return Excel::download(new PaymentsExport($payments), 'payments.csv');
        } else {
            $this->dialog()->error(
                $title = 'No Payments Selected',
                $description = "Please select which payments to export",
            );
        }
    }

    public function exportPDF()
    {
        $payments = $this->getSelected();

        if (!empty($payments)) {
            $this->clearSelected();
            return (new PaymentsExport($payments))->download('payments.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        } else {
            $this->dialog()->error(
                $title = 'No Payments Selected',
                $description = "Please select which payments to export",
            );
        }
    }

    public function columns(): array
    {
        return [
            Column::make("Id")
                ->sortable(),

            Column::make("Name", "user_id")
                ->sortable()
                ->searchable(
                    fn (Builder $query, $term) =>
                    $query->whereHas('user', function ($query) use ($term) {
                        $query->where('first_name', 'like', '%' . $term . '%')
                            ->orWhere('last_name', 'like', '%' . $term . '%');
                    })
                )
                ->format(fn ($value, $row) => $row->user->first_name . ' ' . $row->user->last_name)
                ->eagerLoadRelations(),

            Column::make("Status", "payment_status")
                ->sortable()
                ->format(function ($value) {
                    if ($value === 'Pending') {
                        return '<div class="w-32 py-1 text-center rounded-full shadow-sm bg-indigo-300 text-indigo-700 font-bold text-xs uppercase">' . $value . '</div>';
                    }
                    if ($value === 'Paid') {
                        return '<div class="w-32 py-1 text-center rounded-full shadow-sm bg-green-300 text-green-700 font-bold text-xs uppercase">' . $value . '</div>';
                    } else {
                        return '<div class="w-32 py-1 text-center rounded-full shadow-sm bg-orange-300 text-orange-700 font-bold text-xs uppercase">' . $value . '</div>';
                    }
                })
                ->html()
                ->collapseOnTablet(),

            Column::make("Payment Date", "created_at")
                ->sortable()
                ->format(fn ($value) => date('F j, Y', strtotime($value)))
                ->collapseOnTablet(),

            Column::make("Actions")
                ->label(fn ($row, Column $column) => view('livewire.payment.actions-col')->withRow($row))
                ->collapseOnTablet(),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Payment Status')
                ->options([
                    '' => 'All',
                    'Paid' => 'Paid',
                    'Pending' => 'Pending',
                    'Refunded' => 'Refunded'
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === 'Paid') {
                        $builder->where('payment_status', 'Paid');
                    } else if ($value === 'Pending') {
                        $builder->where('payment_status', 'Pending');
                    } else {
                        $builder->where('payment_status', 'Refunded');
                    }
                }),
        ];
    }

    public function builder(): Builder
    {
        return Payments::whereHas('academic_year', function ($query) {
            $query->where('status', "Ongoing");
        });
    }

    public function refund($id)
    {
        if ($this->authorize('update_payment')) {
            $this->dialog()->confirm([
                'id' => 'custom',
                'style' => "center",
                'title'       => 'Are you Sure?',
                'description' => "This payment will be recorded as Refunded",
                'icon'        => 'warning',
                'accept'      => [
                    'label'  => 'Yes, refund',
                    'method' => 'update',
                    'params' => $id,
                ],
                'reject' => [
                    'label'  => 'No, cancel',
                    'method' => '',
                ],
            ]);
        } else {
            $this->dialog()->error(
                $title = 'Access Denied',
                $description = "Current user does not have the permission to update the record",
            );
        }
    }

    public function update($id)
    {
        //dd("qwe");
        $payments = Payments::find($id);
        $settings = Setting::find(1);

        if (!empty($payments->accountant_id)) {
            $accountant = $payments->accountant_id;
        } else {
            $accountant = Auth::user()->id;
        }

        $payments->forceFill([
            'payment_status' => 'Refunded',
            'accountant_id' => $accountant,
        ])->save();

        if ($settings->notify_payments === 1) {
            if ($settings->notification_channel === "Email") {
                $this->sendMail($payments);
            } else if ($settings->notification_channel === "SMS") {
                $this->sendMessage('Payment Refunded', '+63 976 054 2645');
            } else if ($settings->notification_channel === "Email and SMS") {
                $this->sendMail($payments);
                $this->sendMessage('Payment Refunded', '+63 976 054 2645');
            }
        }

        $this->emit('refreshDatatable');

        $this->dialog()->success(
            $title = 'Success!',
            $description = 'Record is now successfully updated. Payment is Refunded.'
        );
    }

    public function sendMail(Payments $payments)
    {
        $user = User::find($payments->user_id);

        if (!empty($payments->fee_id)) {
            $type = $payments->fee->fee_name;
        } else {
            $type = $payments->others;
        }

        $payment = [
            'name' => $payments->user_id,
            'accountant' => $payments->accountant_id,
            'amount_paid' => $payments->amount_paid,
            'payment_type' => $type,
            'method' => $payments->payment_method,
            'balance' => $payments->balance,
            'academic_year' => $payments->academic_year_id,
            'status' => $payments->payment_status,
        ];

        $message = "We would like to inform you that your request for a refund for your payment in <b>" . $type . "</b> with the amount of <b> Php " . number_format($payments->amount_paid, 2) . "</b> is now being processed.";

        Notification::sendNow($user, new PaymentNotification($payment, $message));
    }

    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            $recipients,
            ['from' => $twilio_number, 'body' => $message]
        );
    }
}
