<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CreateTeacher extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $user;

    public $gender;
    public $genderm = 'Male';
    public $genderf = 'Female';
    public $gendero = 'Rather not say';
    
    protected function rules()
    {
        return [
            // personal info
            'user.firstname' => ['required'],
            'user.lastname' => ['required'],
            'user.email' => ['required', 'unique:users,email'],
            'user.firstname' => ['required'],
            'user.lastname' => ['required'],
            'user.middlename' => ['nullable'],
            'user.suffix' => ['nullable'],
            'user.birthdate' => ['required'],
            'user.birthplace' => ['required'],
            'user.religion' => ['required'],
            'user.gender' => ['required'],
            'user.mothertongue' => ['required'],
            'user.nationality' => ['required'],
            'user.pwdid' => ['unique:users,pwdid'],

            // physical info
            'user.height' => ['nullable'],
            'user.weight' => ['nullable'],

            // contact info
            'user.mobilenumber' => ['required', 'unique:users,mobilenumber'],
            'user.address' => ['required'],
        ];
    }


    public function mount()
    {
        $this->pwdid = null;
        $this->height = null;
        $this->weight = null;
    }

    public function render()
    {
        return view('livewire.user.create-teacher');
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

        $tst =User::create([
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
        ]);

        $this->closeModal();

        $this->emit('refreshDatatable');
        
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Subject successfully Created.'
        );
    }
    
    public static function modalMaxWidth(): string
    {
        return '5xl';
    }
}
