<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class OpenUser extends ModalComponent
{
    use Actions;

    public $modalReadUpdateDelete;

    public $user;

    protected function rules()
    {
        return [
            // personal info
            'user.firstname' => ['required'],
            'user.lastname' => ['required'],
            'user.middlename' => ['required'],
            'user.email' => ['required', 'email', 'unique:users,email, '.$this->user->id],
            'user.suffix' => ['required'],
            'user.birthdate' => ['required'],
            'user.birthplace' => ['required'],
            'user.religion' => ['required'],
            'user.gender' => ['required'],
            'user.mothertongue' => ['required'],
            'user.nationality' => ['required'],
            'user.pwdid' => ['pwdid', 'unique:users,pwdid, '.$this->user->id],

            // physical info
            'user.height' => [],
            'user.weight' => [],

            // contact info
            'user.mobilenumber' => ['required', 'mobilenumber', 'unique:users,mobilenumber, '.$this->user->id],
            'user.address' => ['required'],

            // educational background
            'user.school_kinder' => [],
            'user.school_kindergrad' => [],
            'user.school_elementary' => [],
            'user.school_elementarygrad' => [],
            'user.school_juniorhigh' => [],

            // academic information
            'user.lrn' => ['lrn', 'unique:users,lrn, '.$this->user->id],
            'user.esc' => ['esc', 'unique:users,esc, '.$this->user->id],
            'user.qvr' => ['qvr', 'unique:users,qvr, '.$this->user->id],
            'user.public' => ['public', 'unique:users,public, '.$this->user->id],

            // beneficiary, guardian, and parents info
            'user.beneficiary' => [],
            'user.guardian_name' => [],
            'user.guardian_number' => ['guardian_number', 'unique:users,guardian_number, '.$this->user->id],
            'user.guardian_occupation' => [],
            'user.guardian_address' => [],
            'user.guardian_relationship' => [],
            'user.mparent_name' => [],
            'user.mparent_number' => ['mparent_number', 'unique:users,mparent_number, '.$this->user->id],
            'user.mparent_occupation' => [],
            'user.mparent_address' => [],
            'user.fparent_name' => [],
            'user.fparent_number' => ['fparent_number', 'unique:users,fparent_number, '.$this->user->id],
            'user.fparent_occupation' => [],
            'user.fparent_address' => [],
            // 'role.name' => ['required', "unique:roles,name,".$this->role['id']]
            // 'user.password' => ['required', 'min:8', 'confirmed'],
            // 'account_type' => ['required', 'in:Admin,Staff,Teacher,Student,Guest'],
        ];
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->cardTitle = $user->firstname." Information";
    }

    public function render()
    {
        return view('livewire.user.open-user');
    }

    public function save(): void
    {
        $this->validate();

        $this->modalReadUpdateDelete = false;

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Save the information?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, save it',
                'method' => 'submit',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        // Check if user has permission
        if (!auth()->user()->can('update_user')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        }else{
            $this->user->save();

            $this->emit('refreshDatatable');

            $this->closeModal();

            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'User information successfully saved.'
            );
        }
    }

    public function deleteDialog()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete this user?',
            'icon'        => 'warning',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'delete',
                'params' => 'Deleted',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function delete()
    {
        // Check if user has permission
        if (!auth()->user()->can('delete_user')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        }else{
            $this->user->delete();

            $this->closeModal();
    
            $this->emit('refreshDatatable');
    
            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'User deleted successfully.'
            );
        }
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
