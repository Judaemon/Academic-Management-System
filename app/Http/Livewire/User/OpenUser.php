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
            'user.pwdid' => ['required', 'pwdid', 'unique:users,pwdid, '.$this->user->id],
            'user.height' => ['required'],
            'user.weight' => ['required'],
            'user.mobilenumber' => ['required', 'mobilenumber', 'unique:users,mobilenumber, '.$this->user->id],
            'user.address' => ['required'],
            'user.school_kinder' => ['required'],
            'user.school_kindergrad' => ['required'],
            'user.school_elementary' => ['required'],
            'user.school_elementarygrad' => ['required'],
            'user.school_juniorhigh' => ['required'],
            'user.lrn' => ['required', 'lrn', 'unique:users,lrn, '.$this->user->id],
            'user.esc' => ['required', 'esc', 'unique:users,esc, '.$this->user->id],
            'user.qvr' => ['required', 'qvr', 'unique:users,qvr, '.$this->user->id],
            'user.public' => ['required', 'public', 'unique:users,public, '.$this->user->id],
            'user.beneficiary' => ['required'],
            'user.guardian_name' => ['required'],
            'user.guardian_number' => ['required', 'guardian_number', 'unique:users,guardian_number, '.$this->user->id],
            'user.guardian_occupation' => ['required'],
            'user.guardian_address' => ['required'],
            'user.guardian_relationship' => ['required'],
            'user.mparent_name' => ['required'],
            'user.mparent_number' => ['required', 'mparent_number', 'unique:users,mparent_number, '.$this->user->id],
            'user.mparent_occupation' => ['required'],
            'user.mparent_address' => ['required'],
            'user.fparent_name' => ['required'],
            'user.fparent_number' => ['required', 'fparent_number', 'unique:users,fparent_number, '.$this->user->id],
            'user.fparent_occupation' => ['required'],
            'user.fparent_address' => ['required'],
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
