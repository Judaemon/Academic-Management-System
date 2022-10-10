<?php

namespace App\Http\Livewire\Subject;

use App\Models\Subject;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class EditSubject extends ModalComponent
{
    use Actions;

    public $modalReadUpdateDelete;

    public $subject;

    protected function rules()
    {
        return [
            'subject.name' => ['required'],
            'subject.teacher_id' => ['nullable'],
            'subject.subject_code' => ['required'],
        ];
    }

    public function mount(subject $subject)
    {
        $this->subject = $subject;
        $this->cardTitle = $subject->name." Information";
    }

    public function render()
    {
        return view('livewire.subject.edit-subject');
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
        $this->subject->save();

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Subject information successfully saved.'
        );
    }

    public function deleteDialog()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete this subject?',
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
        $this->subject->delete();

        $this->closeModal();

        $this->emit('refreshDatatable');

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Subject deleted successfully.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}