<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use WireUi\Traits\Actions;

class CreateUser extends Component
{
    use Actions;

    public $modalCreate;

    public $user;

    protected function rules()
    {
        return [
            'user.firstname' => ['required'],
            'user.lastname' => ['required'],

            'user.email' => ['required', 'email', 'unique:users,email'],
            'user.firstname' => ['required'],
            'user.lastname' => ['required'],
            'user.middlename' => ['required'],
            'user.suffix' => ['required'],
            'user.birthdate' => ['required'],
            'user.birthplace' => ['required'],
            'user.religion' => ['required'],
            'user.gender' => ['required'],
            'user.mothertongue' => ['required'],
            'user.nationality' => ['required'],
            'user.pwdid' => ['required', 'pwdid', 'unique:users,pwdid'],
            'user.height' => ['required'],
            'user.weight' => ['required'],
            'user.mobilenumber' => ['required', 'mobilenumber', 'unique:users,mobilenumber'],
            'user.address' => ['required'],
            'user.school_kinder' => ['required'],
            'user.school_kindergrad' => ['required'],
            'user.school_elementary' => ['required'],
            'user.school_elementarygrad' => ['required'],
            'user.school_juniorhigh' => ['required'],
            'user.lrn' => ['required', 'lrn', 'unique:users,lrn'],
            'user.esc' => ['required', 'esc', 'unique:users,esc'],
            'user.qvr' => ['required', 'qvr', 'unique:users,qvr'],
            'user.public' => ['required', 'public', 'unique:users,public'],
            'user.beneficiary' => ['required'],
            'user.guardian_name' => ['required'],
            'user.guardian_number' => ['required', 'guardian_number', 'unique:users,guardian_number'],
            'user.guardian_occupation' => ['required'],
            'user.guardian_address' => ['required'],
            'user.guardian_relationship' => ['required'],
            'user.mparent_name' => ['required'],
            'user.mparent_number' => ['required', 'mparent_number', 'unique:users,mparent_number'],
            'user.mparent_occupation' => ['required'],
            'user.mparent_address' => ['required'],
            'user.fparent_name' => ['required'],
            'user.fparent_number' => ['required', 'fparent_number', 'unique:users,fparent_number'],
            'user.fparent_occupation' => ['required'],
            'user.fparent_address' => ['required'],
            // 'user.password' => ['required', 'min:8', 'confirmed'],
            // 'account_type' => ['required', 'in:Admin,Staff,Teacher,Student,Guest'],
        ];
    }

    public function render()
    {
        return view('livewire.user.create-user');
    }

    public function save(): void
    {
        $this->validate();

        $this->modalCreate = false;

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Create the user?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, create it',
                'method' => 'submit',
                'params' => 'Created',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        if (!auth()->user()->can('create_user')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        }else{
            User::create([
                'firstname' => $this->user['firstname'],
                'lastname' => $this->user['lastname'],
                'email' => $this->user['email'],
                'password' => Hash::make($this->user['password']),
                'middlename' => $this->user['middlename'],
                'suffix' => $this->user['suffix'],
                'birthdate' => $this->user['birthdate'],
                'birthplace' => $this->user['birthplace'],
                'religion' => $this->user['religion'],
                'gender' => $this->user['gender'],
                'mothertongue' => $this->user['mothertongue'],
                'nationality' => $this->user['nationality'],
                'pwdid' => $this->user['pwdid'],
                'height' => $this->user['height'],
                'weight' => $this->user['weight'],
                'mobilenumber' => $this->user['mobilenumber'],
                'address' => $this->user['address'],
                'school_kinder' => $this->user['school_kinder'],
                'school_kindergrad' => $this->user['school_kindergrad'],
                'school_elementary' => $this->user['school_elementary'],
                'school_elementarygrad' => $this->user['school_elementarygrad'],
                'lrn' => $this->user['lrn'],
                'esc' => $this->user['esc'],
                'qvr' => $this->user['qvr'],
                'public' => $this->user['public'],
                'beneficiary' => $this->user['beneficiary'],
                'guardian_name' => $this->user['guardian_name'],
                'guardian_number' => $this->user['guardian_number'],
                'guardian_occupation' => $this->user['guardian_occupation'],
                'guardian_address' => $this->user['guardian_address'],
                'guardian_relationship' => $this->user['guardian_relationship'],
                'mparent_name' => $this->user['mparent_name'],
                'mparent_number' => $this->user['mparent_number'],
                'mparent_occupation' => $this->user['mparent_occupation'],
                'mparent_address' => $this->user['mparent_address'],
                'fparent_name' => $this->user['fparent_name'],
                'fparent_number' => $this->user['fparent_number'],
                'fparent_occupation' => $this->user['fparent_occupation'],
                'fparent_address' => $this->user['fparent_address'],
                
                // 'account_type' => $this->account_type,
            ]);
    
            $this->emit('refreshDatatable');
    
            $this->reset();
            
            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'User successfully Created.'
            );
        }
    }

    public function closeModal()
    {
        $this->modalCreate = false;
    }
}
