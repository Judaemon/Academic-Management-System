<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CreateStudent extends ModalComponent
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

    public $emergency_contact_name;
    public $emergency_contact_number;
    public $emergency_contact_occupation;
    public $emergency_contact_address;
    public $emergency_contact_relationship;

    public $mparent_name;
    public $mparent_number;
    public $mparent_occupation;
    public $mparent_address;

    public $fparent_name;
    public $fparent_number;
    public $fparent_occupation;
    public $fparent_address;

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
            'lrn' => ['nullable', 'unique:users,lrn'],
            'esc' => ['nullable', 'unique:users,esc'],
            'qvr' => ['nullable', 'unique:users,qvr'],
            'public_id' => ['nullable', 'unique:users,public_id'],

            // beneficiary, emergency contact, and parents info
            'beneficiary' => ['nullable'],

            'emergency_contact_name' => ['required'],
            'emergency_contact_number' => ['required', 'unique:users,emergency_contact_number'],
            'emergency_contact_occupation' => ['nullable'],
            'emergency_contact_address' => ['required'],
            'emergency_contact_relationship' => ['required'],

            'mparent_name' => ['nullable'],
            'mparent_number' => ['nullable', 'unique:users,mparent_number'],
            'mparent_occupation' => ['nullable'],
            'mparent_address' => ['nullable'],

            'fparent_name' => ['nullable'],
            'fparent_number' => ['nullable', 'unique:users,fparent_number'],
            'fparent_occupation' => ['nullable'],
            'fparent_address' => ['nullable'],
        ];
    }

    public function render()
    {
        return view('livewire.user.create-student');
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
        $this->authorize('create_student');

        // firstname.first_letter_of_lastname ex. firstname = Sample, lastname = Sample, password = sample.s
        $password = strtolower(mb_substr($this->firstname, 0, 1, 'utf-8') . '.' . $this->lastname);

        $user = User::create([
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

            // beneficiary, emergency contact, and parents info
            'beneficiary' => $this->beneficiary,
            'emergency_contact_name' => $this->emergency_contact_name,
            'emergency_contact_number' => $this->emergency_contact_number,
            'emergency_contact_occupation' => $this->emergency_contact_occupation,
            'emergency_contact_address' => $this->emergency_contact_address,
            'emergency_contact_relationship' => $this->emergency_contact_relationship,
            'mparent_name' => $this->mparent_name,
            'mparent_number' => $this->mparent_number,
            'mparent_occupation' => $this->mparent_occupation,
            'mparent_address' => $this->mparent_address,
            'fparent_name' => $this->fparent_name,
            'fparent_number' => $this->fparent_number,
            'fparent_occupation' => $this->fparent_occupation,
            'fparent_address' => $this->fparent_address,
        ]);

        // Granting the Student role to the newly created user 
        $user->assignRole('Student');

        $this->closeModal();

        $this->emit('refreshDatatable');

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'User successfully Created.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
