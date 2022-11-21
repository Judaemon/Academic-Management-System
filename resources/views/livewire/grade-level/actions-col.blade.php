<div class="flex flex-row space-x-2">

    @can ('update_grade_level')
    <x-button wire:ignore.self icon="pencil" info label="Edit"  
        onclick="livewire.emit('openModal', 'grade-level.edit-grade-level', {{ json_encode(['grade_level' => $value]) }})" 
    />
    @endcan

    @can ('read_grade_level')
    <x-button wire:ignore.self icon="eye" green label="View"  
        onclick="livewire.emit('openModal', 'grade-level.view-grade-level', {{ json_encode(['grade_level' => $value]) }})" 
    />
    @endcan

    @can ('delete_grade_level')
    <x-button wire:ignore.self icon="trash" negative label="Delete"
        onclick="livewire.emit('openModal', 'grade-level.delete-grade-level', {{ json_encode(['grade_level' => $value]) }})" 
    />
    @endcan

</div>