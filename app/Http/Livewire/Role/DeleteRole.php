<?php

namespace App\Http\Livewire\Role;

use App\Models\Role;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class DeleteRole extends ModalComponent
{
    use Actions;

    public $role;

    public function mount(Role $role)
    {
        $this->role = $role;
    }

    public function render()
    {
        return view('livewire.role.delete-role');
    }

    public function deleteDialog()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete this role?',
            'icon'        => 'warning',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'delete',
                'params' => 'Deleted',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
            'onDismiss' => [
                'method' => 'closeModal',
                'params' => 'closeModal',
            ],
        ]);
    }

    public function delete()
    {
        // Check if user has permission
        if (!auth()->user()->can('delete_role')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        }else{
            $this->role->delete();

            $this->closeModal();

            $this->emit('refreshDatatable');

            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'Role deleted successfully.'
            );
        }

    }
}
