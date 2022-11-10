<div class="flex flex-row space-x-2">

    @can ('update_grade')
    <x-button wire:ignore.self icon="pencil" info label="Edit"  
        onclick="livewire.emit('openModal', 'student-grades.student-edit-grade', {{ json_encode(['grade' => $value]) }})"
    />
    @endcan

    @can ('read_grade')
    <x-button wire:ignore.self icon="eye" green label="View"  
        onclick="livewire.emit('openModal', 'student-grades.student-view-grade', {{ json_encode(['grade' => $value]) }})" 
    />
    @endcan

    @can ('delete_grade')
    <x-button wire:ignore.self icon="trash" negative label="Delete"
        onclick="livewire.emit('openModal', 'student-grades.student-delete-grade', {{ json_encode(['grade' => $value]) }})" 
    />
    @endcan

</div>