<div class="flex flex-row space-x-2">
    @if ('update_grade_levels')
        <x-button icon="pencil" info label="Edit"  
            onclick="livewire.emit('openModal', 'grade-level.edit-grade-level', {{ json_encode(['grade_level' => $value]) }})" 
        />
    @endif

    @if ('read_grade_levels')
        <x-button icon="eye" green label="View"  
            onclick="livewire.emit('openModal', 'grade-level.view-grade-level', {{ json_encode(['grade_level' => $value]) }})" 
        />
    @endif

    @if ('delete_grade_levels')
        <x-button icon="trash" negative label="Delete"
            onclick="livewire.emit('openModal', 'grade-level.delete-grade-level', {{ json_encode(['grade_level' => $value]) }})" 
        />
    @endif
</div>