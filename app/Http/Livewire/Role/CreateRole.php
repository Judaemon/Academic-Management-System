<?php

namespace App\Http\Livewire\Role;

use App\Models\Role;
use Livewire\Component;
use WireUi\Traits\Actions;

class CreateRole extends Component
{
    use Actions;

    public $createRoleModal;

    public $newRoleName;

    public $user_permissions = []; //View id is 1

    public function updatedUserPermissions($value)
    {
        $isViewEnabled = in_array("1", $this->user_permissions);

        if (!$isViewEnabled && $value != null) {
            array_push($this->user_permissions, "1");
        }
    }

    public $role_permissions = []; //View id is 6

    public function updatedRolePermissions($value)
    {
        $isViewEnabled = in_array("6", $this->role_permissions);

        if (!$isViewEnabled && $value != null) {
            array_push($this->role_permissions, "6");
        }
    }

    public $system_permissions = []; ////View id is 11

    public function updatedSystemPermissions($value)
    {
        $isViewEnabled = in_array("11", $this->system_permissions);

        if (!$isViewEnabled && $value != null) {
            array_push($this->system_permissions, "11");
        }
    }

    protected function rules()
    {
        return [
            'newRoleName' => ['required', 'unique:roles,name'],
        ];
    }

    public function render()
    {
        return view('livewire.role.create-role');
    }

    public function save(): void
    {
        $this->validate();

        $this->createRoleModal = false;

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Create this new role '.$this->newRoleName.'?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, create it',
                'method' => 'submit',
                'params' => 'created',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        if (!auth()->user()->can('create_role')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        }else{
            $role = Role::create([
                'name' => $this->newRoleName,
            ]);

            $permissions = array_merge($this->user_permissions, $this->role_permissions, $this->system_permissions);

            $role->syncPermissions($permissions);

            $this->emit('refreshDatatable');

            $this->reset();

            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'Role successfully created.'
            );
        }
    }

    public function closeModal()
    {
        $this->createRoleModal = false;
    }
}
