<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditUser extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $user;

    protected function rules()
    {
        if ($this->user->hasRole('Student')) {
            return [
                // personal info
                'user.first_name' => ['required'],
                'user.middle_name' => ['nullable'],
                'user.last_name' => ['required'],
                'user.suffix' => ['nullable'],

                'user.birth_date' => ['required'],
                'user.birth_place' => ['required'],
                'user.nationality' => ['required'],
                'user.gender' => ['required'],
                'user.religion' => ['nullable'],
                'user.mother_tongue' => ['required'],

                // physical info
                'user.height' => ['nullable'],
                'user.weight' => ['nullable'],
                'user.pwd_id' => ['nullable', 'unique:users,pwd_id,' . $this->user->id],

                // contact info
                'user.email' => ['required', 'unique:users,email,' . $this->user->id],
                'user.mobile_number' => ['required', 'unique:users,mobile_number,' . $this->user->id],
                'user.address' => ['required'],

                // educational background
                'user.kinder_name' => ['nullable'],
                'user.kinder_grad_date' => ['sometimes'],
                'user.elementary_name' => ['nullable'],
                'user.elementary_grad_date' => ['sometimes'],
                'user.junior_high_name' => ['nullable'],
                'user.junior_high_grad_date' => ['sometimes'],

                // academic info
                'user.lrn' => ['nullable', 'unique:users,lrn'],
                'user.esc' => ['nullable', 'unique:users,esc'],
                'user.qvr' => ['nullable', 'unique:users,qvr'],

                'user.mother_name' => ['nullable'],
                'user.mother_number' => ['nullable', 'unique:users,mother_number,' . $this->user->id],
                'user.mother_email' => ['nullable'],
                'user.mother_address' => ['nullable'],

                'user.father_name' => ['nullable'],
                'user.father_number' => ['nullable', 'unique:users,father_number,' . $this->user->id],
                'user.father_email' => ['nullable'],
                'user.father_address' => ['nullable'],

                'user.emergency_contact_name' => ['required'],
                'user.emergency_contact_number' => ['required', 'unique:users,emergency_contact_number,' . $this->user->id],
                'user.emergency_contact_address' => ['required'],
                'user.emergency_contact_relationship' => ['required'],
            ];
        }

        return [
            // personal info
            'user.first_name' => ['required'],
            'user.last_name' => ['required'],
            'user.email' => ['required', 'unique:users,email'],
            'user.last_name' => ['required'],
            'user.middle_name' => ['nullable'],
            'user.suffix' => ['nullable'],
            'user.birth_date' => ['required'],
            'user.birth_place' => ['required'],
            'user.religion' => ['nullable'],
            'user.gender' => ['required'],
            'user.mother_tongue' => ['required'],
            'user.nationality' => ['required'],
            'user.pwd_id' => ['nullable', 'unique:users,pwd_id'],

            // physical info
            'user.height' => ['nullable'],
            'user.weight' => ['nullable'],

            // contact info
            'user.mobile_number' => ['required', 'unique:users,mobile_number'],
            'user.address' => ['required'],

            // educational background
            'user.elementary_name' => ['nullable'],
            'user.elementary_grad_date' => ['nullable'],
            'user.junior_high_name' => ['nullable'],

            // academic info
            'user.lrn' => ['nullable', 'unique:users,lrn'],
            'user.esc' => ['nullable', 'unique:users,esc'],
            'user.qvr' => ['nullable', 'unique:users,qvr'],
            'user.public_id' => ['nullable', 'unique:users,public_id'],

            // beneficiary, emergency contact, and parents info
            'user.beneficiary' => ['nullable'],

            'user.emergency_contact_name' => ['required'],
            'user.emergency_contact_number' => ['required', 'unique:users,emergency_contact_number'],
            'user.emergency_contact_address' => ['required'],
            'user.emergency_contact_relationship' => ['required'],

            'user.mother_name' => ['nullable'],
            'user.mother_number' => ['nullable', 'unique:users,mother_number'],
            'user.mother_email' => ['nullable'],
            'user.mother_address' => ['nullable'],

            'user.father_name' => ['nullable'],
            'user.father_number' => ['nullable', 'unique:users,father_number'],
            'user.father_email' => ['nullable'],
            'user.father_address' => ['nullable'],
        ];
    }

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.user.edit-user');
    }

    public function save(): void
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Save the information?',
            'icon'        => 'question',
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
        $this->authorize('update_user');

        $this->user->save();

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'User information successfully saved.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
