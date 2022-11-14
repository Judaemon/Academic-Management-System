<div class="flex flex-row space-x-2">
    @can('update_attendances')
        <x-button wire:ignore.self icon="pencil" info label="Edit"  
            onclick="livewire.emit('openModal', 'attendance.edit-attendance', {{ json_encode(['attendance' => $value]) }})" 
        />
    @endcan

    @can('read_attendances')
        <x-button wire:ignore.self icon="eye" green label="View"  
            onclick="livewire.emit('openModal', 'attendance.view-attendance', {{ json_encode(['attendance' => $value]) }})" 
        />
    @endcan

    @can('delete_attendances')
        <x-button wire:ignore.self icon="trash" negative label="Delete"
            onclick="livewire.emit('openModal', 'attendance.delete-attendance', {{ json_encode(['attendance' => $value]) }})" 
        />
    @endcan
</div>