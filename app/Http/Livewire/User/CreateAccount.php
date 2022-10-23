<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CreateAccount extends ModalComponent
{
    use AuthorizesRequests, Actions;

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

    public $beneficiary;

    public $pag_ibig;
    public $philhealth;
    public $sss;
    public $tin;

    public $mobilenumber;
    public $address;

    public $emergency_contact_name;
    public $emergency_contact_number;
    public $emergency_contact_occupation;
    public $emergency_contact_address;
    public $emergency_contact_relationship;
    
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
            'pwdid' => ['nullable', 'unique:users,pwdid'],

            // physical info
            'height' => ['nullable'],
            'weight' => ['nullable'],

            // beneficiary
            'beneficiary' => ['nullable'],

            // contact info
            'mobilenumber' => ['required', 'unique:users,mobilenumber'],
            'address' => ['required'],

            // additional account info
            'pag_ibig' => ['required', 'unique:users,pag_ibig'],
            'philhealth' => ['required', 'unique:users,philhealth'],
            'sss' => ['required', 'unique:users,sss'],
            'tin' => ['required', 'unique:users,tin'],

            // emergency contact
            'emergency_contact_name' => ['required'],
            'emergency_contact_number' => ['required','unique:users,emergency_contact_number'],
            'emergency_contact_occupation' => ['nullable'],
            'emergency_contact_address' => ['required'],
            'emergency_contact_relationship' => ['required'],

            // 'account_type' => ['required', 'in:Admin,Staff,Teacher,Student,Guest'],
        ];
    }

    public function render()
    {
        return view('livewire.user.create-account');
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
        $this->authorize('create_account');

        // firstname.firstletteroflastname ex. firstname = Mark, lastname = Zuckerberg, password = mark.z
        $password = strtolower(mb_substr($this->firstname, 0, 1, 'utf-8').'.'.$this->lastname);

        $user =User::create([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'password' => Hash::make($password),
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

                // beneficiary
                'beneficiary' => $this->beneficiary,

                // contact info
                'mobilenumber' => $this->mobilenumber,
                'address' => $this->address,

                // additional account info
                'pag_ibig' => $this->pag_ibig,
                'philhealth' => $this->philhealth,
                'sss' => $this->sss,
                'tin' => $this->tin,

                // emergency contact person
                'emergency_contact_name' => $this->emergency_contact_name,
                'emergency_contact_number' => $this->emergency_contact_number,
                'emergency_contact_occupation' => $this->emergency_contact_occupation,
                'emergency_contact_address' => $this->emergency_contact_address,
                'emergency_contact_relationship' => $this->emergency_contact_relationship,
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