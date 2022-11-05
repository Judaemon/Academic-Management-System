<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class UpdateContactInformation extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $mobile_number;
    public $email;
    public $address;

    protected function rules()
    {
        return [
            'mobile_number' => ['required', 'unique:users,mobile_number,' . auth()->user()->id],
            'email' => ['required', 'email', 'unique:users,email,' . auth()->user()->id],
            'address' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.profile.update-contact-information');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Update contact information information?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, update it',
                'method' => 'submit',
                'params' => 'updated',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function mount()
    {
        $this->mobile_number = auth()->user()->mobile_number;
        $this->email = auth()->user()->email;
        $this->address = auth()->user()->address;
    }

    public function submit()
    {
        $this->authorize('update_contact_information');

        User::query()
            ->where('id', auth()->user()->id)
            ->update(
                [
                    'mobile_number' => $this->mobile_number,
                    'email' => $this->email,
                    'address' => $this->address,
                ]
            );

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Section information successfully saved.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
}
