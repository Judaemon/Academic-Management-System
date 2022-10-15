<?php

namespace App\Http\Livewire\Role;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class AssignRole extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $user;
    public $roles = [];
    
    protected function rules()
    {
        return [
            'user' => ['required'],
            'roles' => ['required', 'array'],
            'roles.*' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.role.assign-role');
    }

    public function updatedUser($value)
    {
        $this->roles = User::query()
            ->find($value)
            ->roles
            ->pluck('id');
    }

    public function save()
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Assign this roles to the selected user?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, assign it',
                'method' => 'submit',
                'params' => 'Assigned',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
        
    }

    public function submit()
    {
        $this->authorize('assign_role');

        User::query()
            ->find($this->user)
            ->syncRoles($this->roles);

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Roles successfully assigned.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
