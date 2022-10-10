<?php

namespace App\Http\Livewire\Section;

use App\Models\Section;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use WireUi\Traits\Actions;

class CreateSection extends Component
{
    use Actions;

    public $modalCreate;

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

    public function render()
    {
        return view('livewire.section.create-section');
    }

    public function save(): void
    {
        $this->validate();

        $this->modalCreate = false;

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Create the section?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, create it',
                'method' => 'submit',
                'params' => 'Created',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        Section::create([
            'name' => $this->section['name'],
            'capacity' => $this->section['capacity'],
            'teacher_id' => $this->section['teacher_id'],
            'grade_level_id' => $this->section['grade_level_id'],
        ]);

        $this->emit('refreshDatatable');

        $this->reset();
        
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Section successfully Created.'
        );
    }

    public function closeModal()
    {
        $this->modalCreate = false;
    }
}
