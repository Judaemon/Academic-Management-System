<?php

namespace App\Http\Livewire\Fee;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Fee;
use App\Models\GradeLevel;

class EditFee extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $fee;

    public $name;
    public $amount;
    public $grade_level;
 
    public function mount(Fee $fee)
    {
        $this->fee = $fee;

        $this->card_title = "Edit ".$fee->fee_name;

        $this->name = $fee->fee_name;
        $this->amount = $fee->amount;
        $this->grade_level = $fee->grade_level_id;
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'min:5', 'max:35'],
            'amount' => ['required', 'numeric'],
            'grade_level' => ['nullable', 'unique:grade_levels,id,'.$this->grade_level],
        ];
    }

    public function render()
    {
        return view('livewire.fee.edit-fee');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => "Edit ".$this->fee->fee_name." Information ?",
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, create it',
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
        $this->authorize('update_fee');

        $this->fee->forceFill([
            'fee_name' => $this->name,
            'amount' => $this->amount,
            'grade_level_id' => $this->grade_level,
        ])->save();
    
        $this->emit('refreshDatatable');

        $this->closeModal();
            
        $this->dialog()->success(
            $title = 'Successful!',
            $description = $this->fee->fee_name.' successfully Updated.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
