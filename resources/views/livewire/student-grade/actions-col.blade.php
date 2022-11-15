<div class="flex flex-row space-x-2">

    @can ('view_grades')
    <x-button wire:ignore.self icon="eye" green label="View Grades"  
        onclick="livewire.emit('openModal', 'student-grade.view-grade', {{ json_encode(['admission' => $value]) }})" 
    />
    @endcan

</div>