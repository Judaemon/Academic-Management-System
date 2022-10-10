<?php

namespace App\Http\Livewire\Section;

use App\Models\Section;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class EditSection extends ModalComponent
{
    use Actions;

    public $modalReadUpdateDelete;

    public $section;

    protected function rules()
    {
        return [
            'section.name' => ['required'],
            'section.capacity' => ['required'],
            'section.teacher_id' => ['nullable'],
            'section.grade_level_id' => ['nullable'],
        ];
    }

    public function mount(Section $section)
    {
        $this->section = $section;
        $this->cardTitle = $section->name." Information";
    }

    public function render()
    {
        return view('livewire.section.edit-section');
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
        $this->section->save();

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Section information successfully saved.'
        );
    }

    public function deleteDialog()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete this section?',
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
        $this->section->delete();

        $this->closeModal();

        $this->emit('refreshDatatable');

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Section deleted successfully.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
