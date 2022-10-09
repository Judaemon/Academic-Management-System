<?php

namespace App\Http\Livewire\Role;

use App\Models\Role;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ViewRole extends ModalComponent
{
    use Actions;

    public $modalReadUpdateDelete;

    public $role;

    public $permissions;

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
            'role.name' => ['required'],
        ];
    }

    public function mount(Role $role)
    {
        $this->role = $role;

        if ($role->name == "Super Admin") {
            $this->user_permissions = [1, 2, 3, 4, 5];
            $this->role_permissions = [6, 7, 8, 9, 10];
            $this->system_permissions = [11, 12, 13];
        }else {
            $permissions = $this->role->permissions->pluck('id')->toArray();

            foreach ($permissions as $key => $permission) {
                if (in_array($permission, [1, 2, 3, 4, 5])) {
                    array_push($this->user_permissions, $permission);
                }
            }

            foreach ($permissions as $key => $permission) {
                if (in_array($permission, [6, 7, 8, 9, 10])) {
                    array_push($this->role_permissions, $permission);
                }
            }

            foreach ($permissions as $key => $permission) {
                if (in_array($permission, [11, 12, 13])) {
                    array_push($this->system_permissions, $permission);
                }
            }
        }

        $this->cardTitle = $role->name." Information";
    }

    public function render()
    {
        return view('livewire.role.view-role');
    }

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }
}
