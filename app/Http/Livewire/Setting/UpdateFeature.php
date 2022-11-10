<?php

namespace App\Http\Livewire\Setting;

use App\Models\Program;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use WireUi\Traits\Actions;

class UpdateFeature extends Component
{
    use AuthorizesRequests, Actions;

    public $notify_grades;
    public $notify_payments;
    public $notification_channel;
    public $current_quarter;
    public $isAbleToUploadGrade;
    public $programs;

    protected $rules = [
        'notify_grades' => 'required|boolean',
        'notify_payments' => 'required|boolean',

        // ['Email', 'SMS', 'Email and SMS']
        'notification_channel' => 'required|in:Email,SMS,Email and SMS',

        // ['First quarter', 'Second quarter', 'Third quarter', 'Fourth quarter']
        'current_quarter' => 'required|in:First quarter,Second quarter,Third quarter,Fourth quarter',

        'isAbleToUploadGrade' => 'required|boolean',

        'programs' => 'required',
    ];

    public function mount()
    {
        $this->notify_grades = setting('notify_grades');
        $this->notify_payments = setting('notify_payments');
        $this->notification_channel = setting('notification_channel');
        $this->current_quarter = setting('current_quarter');
        $this->isAbleToUploadGrade = setting('isAbleToUploadGrade');

        $this->programs = Program::query()
            ->where('isEnabled', true)
            ->pluck('id')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.setting.update-feature');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => "You are changing the institute profile.",
            'icon'        => 'warning',
            'accept'      => [
                'label'  => 'Yes, save it',
                'method' => 'submit',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        cache()->forget('setting');

        $this->authorize('update_setting');

        $this->validate();

        Setting::query()
            ->where('id', 1)
            ->update([
                'notify_grades' => $this->notify_grades,
                'notify_payments' => $this->notify_payments,
                'notification_channel' => $this->notification_channel,
                'current_quarter' => $this->current_quarter,
                'isAbleToUploadGrade' => $this->isAbleToUploadGrade,
            ]);

        Program::query()
            ->whereNotIn('id', $this->programs)->update(
                ['isEnabled' => false]
            );

        Program::query()
            ->whereIn('id', $this->programs)->update(
                ['isEnabled' => true]
            );

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Refresh the page to see it take effect.'
        );
    }
}
