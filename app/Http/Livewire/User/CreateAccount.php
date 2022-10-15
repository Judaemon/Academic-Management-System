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

    public $account;
    
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

            // 'password' => ['required', 'min:8'],
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
