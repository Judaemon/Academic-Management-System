<?php

namespace App\Http\Livewire\Role;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class EditRole extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $role;

    public $permissions;
    public $role_permissions = [];


    protected function rules()
    {
        return [
            'role.name' => ['required', 'unique:roles,name,'.$this->role->id],
        ];
    }

    public function mount(Role $role)
    {
        $this->role = $role;

        $this->permissions = Permission::all();
        $this->role_permissions = $this->role->permissions->pluck('name')->toArray();
    }

    public function render()
    {
        return view('livewire.role.edit-role');
    }

    public function save(): void
    {
        $this->validate();

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
        $this->authorize('create_role');

        $this->role->save();

        $this->role->syncPermissions($this->role_permissions);

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Role information successfully saved.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }
}
