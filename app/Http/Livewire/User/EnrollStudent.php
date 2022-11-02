<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EnrollStudent extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $first_name;
    public $last_name;
    public $middle_name;
    public $email;
    public $suffix;
    public $birth_date;
    public $birthplace;
    public $religion;
    public $gender;
    public $mother_tongue;
    public $nationality;
    public $pwd_id;

    public $height;
    public $weight;

    public $mobile_number;
    public $address;

    public $elementary_name;
    public $elementary_grad_date;
    public $junior_high_name;

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
            // personal info
            'email' => ['required', 'unique:users,email'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'middle_name' => ['nullable'],
            'suffix' => ['nullable'],
            'birth_date' => ['required'],
            'birthplace' => ['required'],
            'religion' => ['required'],
            'gender' => ['required'],
            'mother_tongue' => ['required'],
            'nationality' => ['required'],
            'pwd_id' => ['nullable', 'unique:users,pwd_id'],

            // physical info
            'height' => ['nullable'],
            'weight' => ['nullable'],

            // contact info
            'mobile_number' => ['required', 'unique:users,mobile_number'],
            'address' => ['required'],

            // educational background
            'elementary_name' => ['nullable'],
            'elementary_grad_date' => ['nullable'],
            'junior_high_name' => ['nullable'],

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
        return view('livewire.user.enroll-student');
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

        // first_name.first_letter_of_last_name ex. first_name = Sample, last_name = Sample, password = sample.s
        $password = strtolower(mb_substr($this->first_name, 0, 1, 'utf-8') . '.' . $this->last_name);

        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($password),
            'middle_name' => $this->middle_name,
            'suffix' => $this->suffix,
            'birth_date' => $this->birth_date,
            'birthplace' => $this->birthplace,
            'religion' => $this->religion,
            'gender' => $this->gender,
            'mother_tongue' => $this->mother_tongue,
            'nationality' => $this->nationality,
            'pwd_id' => $this->pwd_id,

            // physical info
            'height' => $this->height,
            'weight' => $this->weight,

            // contact info
            'mobile_number' => $this->mobile_number,
            'address' => $this->address,

            // educational background
            'elementary_name' => $this->elementary_name,
            'elementary_grad_date' => $this->elementary_grad_date,

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
