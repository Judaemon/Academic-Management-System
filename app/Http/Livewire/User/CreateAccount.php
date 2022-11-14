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

    public $first_name;
    public $middle_name;
    public $last_name;
    public $suffix;

    public $birth_date;
    public $birth_place;
    public $nationality;
    public $gender;
    public $religion;
    public $mother_tongue;
    public $pwd_id;

    public $mobile_number;
    public $email;
    public $address;

    public $emergency_contact_name;
    public $emergency_contact_number;
    public $emergency_contact_address;
    public $emergency_contact_relationship;

    public $pag_ibig;
    public $philhealth;
    public $sss;
    public $tin;

    public $password;
    public $employee_role;

    protected function rules()
    {
        return [
            // personal info
            'first_name' => ['required'],
            'middle_name' => ['nullable'],
            'last_name' => ['required'],
            'suffix' => ['nullable'],

            'birth_date' => ['required'],
            'birth_place' => ['required'],
            'nationality' => ['required'],
            'gender' => ['required'],
            'religion' => ['nullable'],
            'mother_tongue' => ['required'],
            'pwd_id' => ['nullable', 'unique:users,pwd_id'],

            // Contact information
            'email' => ['required', 'unique:users,email'],
            'mobile_number' => ['required', 'unique:users,mobile_number'],
            'address' => ['required'],

            // emergency contact
            'emergency_contact_name' => ['required'],
            'emergency_contact_number' => ['required', 'unique:users,emergency_contact_number'],
            'emergency_contact_address' => ['required'],
            'emergency_contact_relationship' => ['required'],

            // Government information
            'pag_ibig' => ['nullable', 'unique:users,pag_ibig'],
            'philhealth' => ['nullable', 'unique:users,philhealth'],
            'sss' => ['nullable', 'unique:users,sss'],
            'tin' => ['nullable', 'unique:users,tin'],

            'password' => ['sometimes'],
            'employee_role' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.user.create-account');
    }

    public function save(): void
    {
        // dd($this->employee_role);

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

        if (empty($this->password)) {
            // first_name.first_letter_of_last_name ex. first_name = Sample, last_name = Sample, password = sample.s
            $this->password = strtolower(mb_substr($this->first_name, 0, 1, 'utf-8') . '.' . $this->last_name);
        }

        $user = User::create([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'suffix' => $this->suffix,

            'birth_date' => $this->birth_date,
            'birth_place' => $this->birth_place,
            'nationality' => $this->nationality,
            'gender' => $this->gender,
            'religion' => $this->religion,
            'mother_tongue' => $this->mother_tongue,
            'pwd_id' => $this->pwd_id,

            // contact information
            'mobile_number' => $this->mobile_number,
            'email' => $this->email,
            'address' => $this->address,

            // Emergency contact person
            'emergency_contact_name' => $this->emergency_contact_name,
            'emergency_contact_number' => $this->emergency_contact_number,
            'emergency_contact_address' => $this->emergency_contact_address,
            'emergency_contact_relationship' => $this->emergency_contact_relationship,

            // Government IDs information
            'pag_ibig' => $this->pag_ibig,
            'philhealth' => $this->philhealth,
            'sss' => $this->sss,
            'tin' => $this->tin,

            'password' => Hash::make($this->password),
            'employee_role' => $this->employee_role,
        ]);

        $user->assignRole($this->employee_role);

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
