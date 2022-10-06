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
            // personal info
            'user.firstname' => ['required'],
            'user.lastname' => ['required'],
            'user.email' => ['required', 'unique:users,email'],
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
            'user.pwdid' => ['nullable', 'unique:users,pwdid'],

            // physical info
            'user.height' => ['nullable'],
            'user.weight' => ['nullable'],

            // contact info
            'user.mobilenumber' => ['required', 'unique:users,mobilenumber'],
            'user.address' => ['required'],

            // educational background
            'user.school_kinder' => ['nullable'],
            'user.school_kindergrad' => ['nullable'],
            'user.school_elementary' => ['nullable'],
            'user.school_elementarygrad' => ['nullable'],
            'user.school_juniorhigh' => ['nullable'],

            // academic info
            'user.lrn' => ['nullable', 'unique:users,lrn'],
            'user.esc' => ['nullable', 'unique:users,esc'],
            'user.qvr' => ['nullable', 'unique:users,qvr'],
            'user.public' => ['nullable', 'unique:users,public'],

            // beneficiary, guardian, and parents info
            'user.beneficiary' => ['nullable'],

            'user.guardian_name' => ['nullable'],
            'user.guardian_number' => ['nullable', 'unique:users,guardian_number'],
            'user.guardian_occupation' => ['nullable'],
            'user.guardian_address' => ['nullable'],
            'user.guardian_relationship' => ['nullable'],

            'user.mparent_name' => ['nullable'],
            'user.mparent_number' => ['nullable', 'unique:users,mparent_number'],
            'user.mparent_occupation' => ['nullable'],
            'user.mparent_address' => ['nullable'],

            'user.fparent_name' => ['nullable'],
            'user.fparent_number' => ['nullable', 'unique:users,fparent_number'],
            'user.fparent_occupation' => ['nullable'],
            'user.fparent_address' => ['nullable'],
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
                // personal info
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

                // physical info
                'height' => $this->user['height'],
                'weight' => $this->user['weight'],

                // contact info
                'mobilenumber' => $this->user['mobilenumber'],
                'address' => $this->user['address'],

                // educational background
                'school_kinder' => $this->user['school_kinder'],
                'school_kindergrad' => $this->user['school_kindergrad'],
                'school_elementary' => $this->user['school_elementary'],
                'school_elementarygrad' => $this->user['school_elementarygrad'],

                // academic info
                'lrn' => $this->user['lrn'],
                'esc' => $this->user['esc'],
                'qvr' => $this->user['qvr'],
                'public' => $this->user['public'],

                // beneficiary, guardian, and parents info
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
