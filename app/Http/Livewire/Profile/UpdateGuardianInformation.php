<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class UpdateGuardianInformation extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $emergency_contact_name;
    public $emergency_contact_relationship;
    public $emergency_contact_number;
    public $emergency_contact_address;

    protected function rules()
    {
        return [
            'emergency_contact_name' => ['required'],
            'emergency_contact_relationship' => ['required'],
            'emergency_contact_number' => ['required', 'unique:users,emergency_contact_number,' . auth()->user()->id],
            'emergency_contact_address' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.profile.update-guardian-information');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Update emergency contact information?',
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
        $this->emergency_contact_name = auth()->user()->emergency_contact_name;
        $this->emergency_contact_relationship = auth()->user()->emergency_contact_relationship;
        $this->emergency_contact_number = auth()->user()->emergency_contact_number;
        $this->emergency_contact_address = auth()->user()->emergency_contact_address;
    }

    public function submit()
    {
        $this->authorize('update_emergency_contact_information');

        User::query()
            ->where('id', auth()->user()->id)
            ->update(
                [
                    'emergency_contact_name' => $this->emergency_contact_name,
                    'emergency_contact_relationship' => $this->emergency_contact_relationship,
                    'emergency_contact_number' => $this->emergency_contact_number,
                    'emergency_contact_address' => $this->emergency_contact_address,
                ]
            );

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Emergency contact information successfully saved.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
}
