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
            'section.subjects_id' => ['required'],
            'section.class_limit' => ['required'],
            'section.column_5' => ['required'],
            'section.grade_level_id' => ['required'],
            // 'user.password' => ['required', 'min:8', 'confirmed'],
            // 'account_type' => ['required', 'in:Admin,Staff,Teacher,Student,Guest'],
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
            'subjects_id' => $this->section['subjects_id'],
            'class_limit' => $this->section['class_limit'],
            'column_5' => $this->section['column_5'],
            'grade_level_id' => $this->section['grade_level_id'],
            // 'account_type' => $this->account_type,
        ]);

        $this->emit('refreshDatatable');

        $this->reset();
        
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Section successfully Created.'
        );
    }
}
