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
            'religion' => ['required'],
            'gender' => ['required'],
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

        // last_name.first_letter_of_first_name ex. first_name = Mark, last_name = Zuckerberg, password = zuckerberg.m
        $password = strtolower(mb_substr($this->last_name, 0, 1, 'utf-8') . '.' . $this->first_name);

        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($password),
            'middle_name' => $this->middle_name,
            'suffix' => $this->suffix,
            'birth_date' => $this->birth_date,
            'birth_place' => $this->birth_place,
            'religion' => $this->religion,
            'gender' => $this->gender,
            'mother_tongue' => $this->mother_tongue,
            'nationality' => $this->nationality,
            'pwd_id' => $this->pwd_id,

            // physical info
            'height' => $this->height,
            'weight' => $this->weight,

            // beneficiary
            'beneficiary' => $this->beneficiary,

            // contact info
            'mobile_number' => $this->mobile_number,
            'address' => $this->address,

            // additional account info
            'pag_ibig' => $this->pag_ibig,
            'philhealth' => $this->philhealth,
            'sss' => $this->sss,
            'tin' => $this->tin,

            // emergency contact person
            'emergency_contact_name' => $this->emergency_contact_name,
            'emergency_contact_number' => $this->emergency_contact_number,
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
        return '7xl';
    }
}
