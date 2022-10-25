<?php

namespace App\Http\Livewire\Role;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class CreateRole extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $name;

    public $permissions;
    public $selected_permissions = [];

    protected function rules()
    {
        return [
            'name' => ['required', 'unique:roles,name'],
        ];
    }

    public function mount()
    {
        $this->permissions = Permission::all();
    }

    public function render()
    {
        return view('livewire.role.create-role');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Create this role?',
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
        $this->authorize('create_role');
 
        $role = Role::create([
            'name' => $this->name,
        ]);

        $role->syncPermissions($this->selected_permissions);

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Role successfully created.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '4xl';
    }
}
