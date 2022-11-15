<div class="flex flex-row space-x-2">

    @can ('assign_grades')
    <x-button wire:ignore.self icon="plus" info label="Assign Grades"  
        onclick="livewire.emit('openModal', 'teacher-grade.upload-grade', {{ json_encode(['grade' => $value]) }})" 
    />
    @endcan

</div>