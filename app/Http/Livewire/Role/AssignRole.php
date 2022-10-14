<?php

namespace App\Http\Livewire\Role;

use LivewireUI\Modal\ModalComponent;

class AssignRole extends ModalComponent
{
    public function render()
    {
        return view('livewire.role.assign-role');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
