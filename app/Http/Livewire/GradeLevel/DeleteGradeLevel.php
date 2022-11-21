<?php

namespace App\Http\Livewire\GradeLevel;

use App\Models\GradeLevel;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DeleteGradeLevel extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $grade_level;

    public function mount(GradeLevel $grade_level)
    {
        $this->grade_level = $grade_level;
    }

    public function render()
    {
        return view('livewire.grade-level.delete-grade-level');
    }

    public function deleteDialog()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete this grade level?',
            'icon'        => 'warning',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'submit',
                'params' => 'Deleted',
            ],
            'reject' => [
                'label'  => 'No, cancel',
                'method' => 'closeModal',
            ],
            'onDismiss' => [
                'method' => 'closeModal',
                'params' => 'closeModal',
            ],
        ]);
    }

    public function submit()
    {
        $this->authorize('delete_grade_level');

        $this->grade_level->delete();

        $this->closeModal();

        $this->emit('refreshDatatable');

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Grade Level deleted successfully.'
        );
    }
}
