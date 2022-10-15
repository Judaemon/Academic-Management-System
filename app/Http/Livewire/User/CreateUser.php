<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CreateUser extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $user;
    
    public $firstname;
    public $lastname;
    public $middlename;
    public $email;
    public $suffix;
    public $birthdate;
    public $birthplace;
    public $religion;
    public $gender;
    public $mothertongue;
    public $nationality;
    public $pwdid;

    public $height;
    public $weight;

    public $mobilenumber;
    public $address;

    public $school_kinder;
    public $school_kindergrad;
    public $school_elementary;
    public $school_elementarygrad;
    public $school_juniorhigh;

    public $lrn;
    public $esc;
    public $qvr;
    public $public_id;

    public $beneficiary;

    public $guardian_name;
    public $guardian_number;
    public $guardian_occupation;
    public $guardian_address;
    public $guardian_relationship;

    public $mparent_name;
    public $mparent_number;
    public $mparent_occupation;
    public $mparent_address;

    public $fparent_name;
    public $fparent_number;
    public $fparent_occupation;
    public $fparent_address;

    public $password;
    
    protected function rules()
    {
        return [
            // personal info
            'email' => ['required', 'unique:users,email'],
            'firstname' => ['required'],
            'lastname' => ['required'],
            'middlename' => ['nullable'],
            'suffix' => ['nullable'],
            'birthdate' => ['required'],
            'birthplace' => ['required'],
            'religion' => ['required'],
            'gender' => ['required'],
            'mothertongue' => ['required'],
            'nationality' => ['required'],
            'pwdid' => ['unique:users,pwdid'],

            // physical info
            'height' => ['nullable'],
            'weight' => ['nullable'],

            // contact info
            'mobilenumber' => ['required', 'unique:users,mobilenumber'],
            'address' => ['required'],

            // educational background
            'school_kinder' => ['nullable'],
            'school_kindergrad' => ['nullable'],
            'school_elementary' => ['nullable'],
            'school_elementarygrad' => ['nullable'],
            'school_juniorhigh' => ['nullable'],

            // academic info
            'lrn' => ['unique:users,lrn'],
            'esc' => ['unique:users,esc'],
            'qvr' => ['unique:users,qvr'],
            'public_id' => ['unique:users,public_id'],

            // beneficiary, guardian, and parents info
            'beneficiary' => ['nullable'],

            'guardian_name' => ['nullable'],
            'guardian_number' => ['unique:users,guardian_number'],
            'guardian_occupation' => ['nullable'],
            'guardian_address' => ['nullable'],
            'guardian_relationship' => ['nullable'],

            'mparent_name' => ['nullable'],
            'mparent_number' => ['unique:users,mparent_number'],
            'mparent_occupation' => ['nullable'],
            'mparent_address' => ['nullable'],

            'fparent_name' => ['nullable'],
            'fparent_number' => ['unique:users,fparent_number'],
            'fparent_occupation' => ['nullable'],
            'fparent_address' => ['nullable'],
            // 'password' => ['required', 'min:8'],
            // 'account_type' => ['required', 'in:Admin,Staff,Teacher,Student,Guest'],
        ];
    }

    public function mount(User $user)
    {
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->middlename = $user->middlename;
        $this->suffix = $user->suffix;
        $this->birthdate = $user->birthdate;
        $this->birthplace = $user->birthplace;
        $this->religion = $user->religion;
        $this->gender = $user->gender;
        $this->mothertongue = $user->mothertongue;
        $this->nationality = $user->nationality;
        $this->pwdid = $user->pwdid;

        // physical info
        $this->height = $user->height;
        $this->weight = $user->weight;

        // contact info
        $this->mobilenumber = $user->mobilenumber;
        $this->address = $user->address;

        // educational background
        $this->school_kinder = $user->school_kinder;
        $this->school_kindergrad = $user->school_kindergrad;
        $this->school_elementary = $user->school_elementary;
        $this->school_elementarygrad = $user->school_elementarygrad;

        // academic info
        $this->lrn = $user->lrn;
        $this->esc = $user->esc;
        $this->qvr = $user->qvr;
        $this->public_id = $user->public_id;

        // beneficiary, guardian, and parents info
        $this->beneficiary = $user->beneficiary;
        $this->guardian_name = $user->guardian_name;
        $this->guardian_number = $user->guardian_number;
        $this->guardian_occupation = $user->guardian_occupation;
        $this->guardian_address = $user->guardian_address;
        $this->guardian_relationship = $user->guardian_relationship;
        $this->mparent_name = $user->mparent_name;
        $this->mparent_number = $user->mparent_number;
        $this->mparent_occupation = $user->mparent_occupation;
        $this->mparent_address = $user->mparent_address;
        $this->fparent_name = $user->fparent_name;
        $this->fparent_number = $user->fparent_number;
        $this->fparent_occupation = $user->fparent_occupation;
        $this->fparent_address = $user->fparent_address;
    }

    public function render()
    {
        return view('livewire.user.create-user');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Create the User?',
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
        $this->authorize('create_user');

        $user =User::create([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'middlename' => $this->middlename,
                'suffix' => $this->suffix,
                'birthdate' => $this->birthdate,
                'birthplace' => $this->birthplace,
                'religion' => $this->religion,
                'gender' => $this->gender,
                'mothertongue' => $this->mothertongue,
                'nationality' => $this->nationality,
                'pwdid' => $this->pwdid,

                // physical info
                'height' => $this->height,
                'weight' => $this->weight,

                // contact info
                'mobilenumber' => $this->mobilenumber,
                'address' => $this->address,

                // educational background
                'school_kinder' => $this->school_kinder,
                'school_kindergrad' => $this->school_kindergrad,
                'school_elementary' => $this->school_elementary,
                'school_elementarygrad' => $this->school_elementarygrad,

                // academic info
                'lrn' => $this->lrn,
                'esc' => $this->esc,
                'qvr' => $this->qvr,
                'public_id' => $this->public_id,

                // beneficiary, guardian, and parents info
                'beneficiary' => $this->beneficiary,
                'guardian_name' => $this->guardian_name,
                'guardian_number' => $this->guardian_number,
                'guardian_occupation' => $this->guardian_occupation,
                'guardian_address' => $this->guardian_address,
                'guardian_relationship' => $this->guardian_relationship,
                'mparent_name' => $this->mparent_name,
                'mparent_number' => $this->mparent_number,
                'mparent_occupation' => $this->mparent_occupation,
                'mparent_address' => $this->mparent_address,
                'fparent_name' => $this->fparent_name,
                'fparent_number' => $this->fparent_number,
                'fparent_occupation' => $this->fparent_occupation,
                'fparent_address' => $this->fparent_address,
                // 'password' => $this->password,
        ]);

        $this->closeModal();

        $this->emit('refreshDatatable');
        
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'User successfully Created.'
        );
    }
    
    public static function modalMaxWidth(): string
    {
        return '5xl';
    }
}
