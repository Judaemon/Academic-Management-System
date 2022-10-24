<?php

namespace App\Http\Livewire\Role;

use App\Models\Role;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ViewRole extends ModalComponent
{
    use Actions;

    public $role;
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

        $this->role_permissions = $this->role->permissions->pluck('name')->toArray();
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
