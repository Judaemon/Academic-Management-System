<?php

namespace App\Http\Livewire\Fee;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Fee;
use App\Models\GradeLevel;

class CreateFee extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $name;
    public $amount;

    public $grade_level;
    public $grade_levels;

    protected function rules()
    {
        return [
            'name' => ['required', 'min:5', 'max:35'],
            'amount' => ['required', 'numeric'],
            'grade_level' => ['nullable', 'unique:grade_levels,id,'.$this->grade_level],
        ];
    }

    public function mount()
    {
        $this->grade_levels = GradeLevel::all();
    }

    public function render()
    {
        return view('livewire.fee.create-fee');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Create School Fee?',
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
        $this->authorize('create_fee');
            
        Fee::create([
            'fee_name' => $this->name,
            'amount' => $this->amount,
            'grade_level_id' => $this->grade_level,
        ]);
    
        $this->emit('refreshDatatable');
    
        $this->closeModal();
            
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'School Fee successfully Created.'
        );
    } 

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}