<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditUser extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $modalReadUpdateDelete;

    public $user;

    public $gender;

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

            // educational background
            'user.school_kinder' => ['nullable'],
            'user.school_kindergrad' => ['nullable'],
            'user.school_elementary' => ['nullable'],
            'user.school_elementarygrad' => ['nullable'],
            'user.school_juniorhigh' => ['nullable'],

            // academic info
            'user.lrn' => ['unique:users,lrn'],
            'user.esc' => ['unique:users,esc'],
            'user.qvr' => ['unique:users,qvr'],
            'user.public_id' => ['unique:users,public_id'],

            // beneficiary, guardian, and parents info
            'user.beneficiary' => ['nullable'],

            'user.guardian_name' => ['nullable'],
            'user.guardian_number' => ['unique:users,guardian_number'],
            'user.guardian_occupation' => ['nullable'],
            'user.guardian_address' => ['nullable'],
            'user.guardian_relationship' => ['nullable'],

            'user.mparent_name' => ['nullable'],
            'user.mparent_number' => ['unique:users,mparent_number'],
            'user.mparent_occupation' => ['nullable'],
            'user.mparent_address' => ['nullable'],

            'user.fparent_name' => ['nullable'],
            'user.fparent_number' => ['unique:users,fparent_number'],
            'user.fparent_occupation' => ['nullable'],
            'user.fparent_address' => ['nullable'],
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
        return view('livewire.user.edit-user');
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

        $this->authorize('update_user');

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
