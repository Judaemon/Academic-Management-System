<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class UpdateParentInformation extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $mother_name;
    public $mother_number;
    public $mother_email;
    public $mother_address;

    public $father_name;
    public $father_number;
    public $father_email;
    public $father_address;

    protected function rules()
    {
        return [
            'mother_name' => ['required'],
            'mother_number' => ['required', 'unique:users,mother_number,' . auth()->user()->id],
            'mother_email' => ['required', 'email', 'unique:users,mother_email,' . auth()->user()->id],
            'mother_address' => ['required'],

            'father_name' => ['required'],
            'father_number' => ['required', 'unique:users,mother_number,' . auth()->user()->id],
            'father_email' => ['required', 'email', 'unique:users,mother_email,' . auth()->user()->id],
            'father_address' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.profile.update-parent-information');
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
        $this->mother_name = auth()->user()->mother_name;
        $this->mother_number = auth()->user()->mother_number;
        $this->mother_email = auth()->user()->mother_email;
        $this->mother_address = auth()->user()->mother_address;

        $this->father_name = auth()->user()->father_name;
        $this->father_number = auth()->user()->father_number;
        $this->father_email = auth()->user()->father_email;
        $this->father_address = auth()->user()->father_address;
    }


    public function submit()
    {
        $this->authorize('update_emergency_contact_information');

        User::query()
            ->where('id', auth()->user()->id)
            ->update(
                [
                    'mother_name' => $this->mother_name,
                    'mother_number' => $this->mother_number,
                    'mother_email' => $this->mother_email,
                    'mother_address' => $this->mother_address,

                    'father_name' => $this->father_name,
                    'father_number' => $this->father_number,
                    'father_email' => $this->father_email,
                    'father_address' => $this->father_address,
                ]
            );

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Parent information successfully saved.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '4xl';
    }
}
