<?php

namespace App\Http\Livewire\User;

use LivewireUI\Modal\ModalComponent;
use App\Models\User;

class ViewUser extends ModalComponent
{
    public $user;
    public  $user_roles;

    protected function rules()
    {
        return [
            // personal info
            'user.first_name' => ['required'],
            'user.last_name' => ['required'],
            'user.middle_name' => ['nullable'],
            'user.email' => ['required', 'email', 'unique:users,email, ' . $this->user->id],
            'user.suffix' => ['nullable'],
            'user.birth_date' => ['required'],
            'user.birth_place' => ['required'],
            'user.religion' => ['nullable'],
            'user.gender' => ['required'],
            'user.mother_tongue' => ['required'],
            'user.nationality' => ['required'],
            'user.pwd_id' => ['nullable', 'pwd_id', 'unique:users,pwd_id, ' . $this->user->id],

            // physical info
            'user.height' => ['nullable'],
            'user.weight' => ['nullable'],

            // contact info
            'user.mobile_number' => ['required', 'mobile_number', 'unique:users,mobile_number, ' . $this->user->id],
            'user.address' => ['required'],

            // educational background
            'user.kinder_name' => ['nullable'],
            'user.kinder_grad_date' => ['sometimes'],
            'user.elementary_name' => ['nullable'],
            'user.elementary_grad_date' => ['sometimes'],
            'user.junior_high_name' => ['nullable'],
            'user.junior_high_grad_date' => ['sometimes'],

            // academic information
            'user.lrn' => ['nullable', 'lrn', 'unique:users,lrn, ' . $this->user->id],
            'user.esc' => ['nullable', 'esc', 'unique:users,esc, ' . $this->user->id],
            'user.qvr' => ['nullable', 'qvr', 'unique:users,qvr, ' . $this->user->id],
            'user.public_id' => ['nullable', 'public', 'unique:users,public_id, ' . $this->user->id],

            // beneficiary, emergency contact, and parents info
            'user.emergency_contact_name' => ['required'],
            'user.emergency_contact_number' => ['required', 'emergency_contact_number', 'unique:users,emergency_contact_number' . $this->user->id],
            'user.emergency_contact_address' => ['required'],
            'user.emergency_contact_relationship' => ['required'],

            'user.mother_name' => ['nullable'],
            'user.mother_number' => ['nullable', 'mother_number', 'unique:users,mother_number, ' . $this->user->id],
            'user.mother_email' => ['nullable'],
            'user.mother_address' => ['nullable'],

            'user.father_name' => ['nullable'],
            'user.father_number' => ['nullable', 'father_number', 'unique:users,father_number, ' . $this->user->id],
            'user.father_email' => ['nullable'],
            'user.father_address' => ['nullable'],

            // additional account info
            'user.pag_ibig' => ['nullable', 'unique:users,pag_ibig, ' . $this->user->id],
            'user.philhealth' => ['nullable', 'unique:users,philhealth, ' . $this->user->id],
            'user.sss' => ['nullable', 'unique:users,sss, ' . $this->user->id],
            'user.tin' => ['nullable', 'unique:users,tin, ' . $this->user->id],
        ];
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->user_roles = User::query()
            ->find($user->id)
            ->roles
            ->pluck('id');
    }

    public function render()
    {
        return view('livewire.user.view-user');
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
