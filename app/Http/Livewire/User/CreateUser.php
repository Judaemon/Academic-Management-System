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
            'user.pwdid' => ['unique:users,pwdid'],

            // physical info
            'user.height' => [],
            'user.weight' => [],

            // contact info
            'user.mobilenumber' => ['required', 'unique:users,mobilenumber'],
            'user.address' => ['required'],

            // educational background
            'user.school_kinder' => [],
            'user.school_kindergrad' => [],
            'user.school_elementary' => [],
            'user.school_elementarygrad' => [],
            'user.school_juniorhigh' => [],

            // academic info
            'user.lrn' => ['unique:users,lrn'],
            'user.esc' => ['unique:users,esc'],
            'user.qvr' => ['unique:users,qvr'],
            'user.public' => ['unique:users,public'],

            // beneficiary, guardian, and parents info
            'user.beneficiary' => [],

            'user.guardian_name' => [],
            'user.guardian_number' => ['unique:users,guardian_number'],
            'user.guardian_occupation' => [],
            'user.guardian_address' => [],
            'user.guardian_relationship' => [],

            'user.mparent_name' => [],
            'user.mparent_number' => ['unique:users,mparent_number'],
            'user.mparent_occupation' => [],
            'user.mparent_address' => [],

            'user.fparent_name' => [],
            'user.fparent_number' => ['unique:users,fparent_number'],
            'user.fparent_occupation' => [],
            'user.fparent_address' => [],
            // 'user.password' => ['required', 'min:8', 'confirmed'],
            // 'account_type' => ['required', 'in:Admin,Staff,Teacher,Student,Guest'],
        ];
    }

    public function mount(User $user)
    {
        $this->pwdid = null;
        $this->height = null;
        $this->weight = null;

        $this->school_kinder = null;
        $this->school_kindergrad = null;
        $this->school_elementary = null;
        $this->school_elementarygrad = null;
        $this->school_juniorhigh = null;

        $this->lrn = null;
        $this->esc = null;
        $this->qvr = null;
        $this->beneficiary = null;

        $this->guardian_name = null;
        $this->guardian_number = null;
        $this->guardian_occupation = null;
        $this->guardian_address = null;
        $this->guardian_relationship = null;

        $this->mparent_name = null;
        $this->mparent_number = null;
        $this->mparent_occupation = null;
        $this->mparent_address = null;

        $this->fparent_name = null;
        $this->fparent_number = null;
        $this->fparent_occupation = null;
        $this->fparent_address = null;
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
        //dd($this->user['pwdid']);

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
    
            //$this->reset();
            
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
