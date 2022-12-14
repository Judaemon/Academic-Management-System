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
    public $last_name;
    public $middle_name;
    public $email;
    public $suffix;
    public $birth_date;
    public $birth_place;
    public $religion;
    public $gender;
    public $mother_tongue;
    public $nationality;
    public $pwd_id;

    public $height;
    public $weight;

    public $beneficiary;

    public $pag_ibig;
    public $philhealth;
    public $sss;
    public $tin;

    public $mobile_number;
    public $address;

    public $emergency_contact_name;
    public $emergency_contact_number;
    public $emergency_contact_address;
    public $emergency_contact_relationship;

    public $password;
    public $employee_roles;
    public $employee_role;

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
            'birth_place' => ['required'],
            'nationality' => ['required'],
            'gender' => ['required'],
            'religion' => ['nullable'],
            'mother_tongue' => ['required'],
            'nationality' => ['required'],
            'pwd_id' => ['nullable', 'unique:users,pwd_id'],

            // physical info
            'height' => ['nullable'],
            'weight' => ['nullable'],

            // beneficiary
            'beneficiary' => ['nullable'],

            // contact info
            'mobile_number' => ['required', 'unique:users,mobile_number'],
            'address' => ['required'],

            // additional account info
            'pag_ibig' => ['nullable', 'unique:users,pag_ibig'],
            'philhealth' => ['nullable', 'unique:users,philhealth'],
            'sss' => ['nullable', 'unique:users,sss'],
            'tin' => ['nullable', 'unique:users,tin'],

            // emergency contact
            'emergency_contact_name' => ['required'],
            'emergency_contact_number' => ['required', 'unique:users,emergency_contact_number'],
            'emergency_contact_address' => ['required'],
            'emergency_contact_relationship' => ['required'],
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
            'mother_tongue' => $this->mother_tongue,
            'religion' => $this->religion,

            // physical info
            'weight' => $this->weight,
            'height' => $this->height,
            'pwd_id' => $this->pwd_id,

            // contact info
            'mobile_number' => $this->mobile_number,
            'email' => $this->email,
            'address' => $this->address,

            // emergency contact
            'emergency_contact_name' => $this->emergency_contact_name,
            'emergency_contact_relationship' => $this->emergency_contact_relationship,
            'emergency_contact_number' => $this->emergency_contact_number,
            'emergency_contact_address' => $this->emergency_contact_address,

            // government ids
            'pag_ibig' => $this->pag_ibig,
            'philhealth' => $this->philhealth,
            'sss' => $this->sss,
            'tin' => $this->tin,

            'employee_role' => $this->employee_role,
            'password' => Hash::make($this->password),
        ]);

        $user->assignRole($this->employee_roles);

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
