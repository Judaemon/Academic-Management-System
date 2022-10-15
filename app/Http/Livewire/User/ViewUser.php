<?php

namespace App\Http\Livewire\User;

use LivewireUI\Modal\ModalComponent;
use App\Models\User;

class ViewUser extends ModalComponent
{
    public $user;

    public $gender;

    protected function rules()
    {
        return [
            // personal info
            'user.firstname' => ['required'],
            'user.lastname' => ['required'],
            'user.middlename' => ['nullable'],
            'user.email' => ['required', 'email', 'unique:users,email, '.$this->user->id],
            'user.suffix' => ['nullable'],
            'user.birthdate' => ['required'],
            'user.birthplace' => ['required'],
            'user.religion' => ['required'],
            'user.gender' => ['required'],
            'user.mothertongue' => ['required'],
            'user.nationality' => ['required'],
            'user.pwdid' => ['nullable', 'pwdid', 'unique:users,pwdid, '.$this->user->id],

            // physical info
            'user.height' => ['nullable'],
            'user.weight' => ['nullable'],

            // contact info
            'user.mobilenumber' => ['required', 'mobilenumber', 'unique:users,mobilenumber, '.$this->user->id],
            'user.address' => ['required'],

            // educational background
            'user.school_kinder' => ['nullable'],
            'user.school_kindergrad' => ['nullable'],
            'user.school_elementary' => ['nullable'],
            'user.school_elementarygrad' => ['nullable'],
            'user.school_juniorhigh' => ['nullable'],

            // academic information
            'user.lrn' => ['nullable', 'lrn', 'unique:users,lrn, '.$this->user->id],
            'user.esc' => ['nullable', 'esc', 'unique:users,esc, '.$this->user->id],
            'user.qvr' => ['nullable', 'qvr', 'unique:users,qvr, '.$this->user->id],
            'user.public_id' => ['nullable', 'public', 'unique:users,public_id, '.$this->user->id],

            // beneficiary, guardian, and parents info
            'user.beneficiary' => ['nullable'],
            'user.guardian_name' => ['nullable'],
            'user.guardian_number' => ['nullable', 'guardian_number', 'unique:users,guardian_number, '.$this->user->id],
            'user.guardian_occupation' => ['nullable'],
            'user.guardian_address' => ['nullable'],
            'user.guardian_relationship' => ['nullable'],
            'user.mparent_name' => ['nullable'],
            'user.mparent_number' => ['nullable', 'mparent_number', 'unique:users,mparent_number, '.$this->user->id],
            'user.mparent_occupation' => ['nullable'],
            'user.mparent_address' => ['nullable'],
            'user.fparent_name' => ['nullable'],
            'user.fparent_number' => ['nullable', 'fparent_number', 'unique:users,fparent_number, '.$this->user->id],
            'user.fparent_occupation' => ['nullable'],
            'user.fparent_address' => ['nullable'],
            // 'role.name' => ['required', "unique:roles,name,".$this->role['id']]
            // 'user.password' => ['required', 'min:8', 'confirmed'],
            // 'account_type' => ['required', 'in:Admin,Staff,Teacher,Student,Guest'],
        ];
    }
    
    public function mount(User $user)
    {
        $this->user = $user;
        $this->cardTitle = $user->firstname." Information";
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
