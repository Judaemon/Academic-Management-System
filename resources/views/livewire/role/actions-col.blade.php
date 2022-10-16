<div class="flex flex-row space-x-2">
    @if (auth()->user()->can('update_role'))
        <x-button icon="pencil" info label="Edit"  
            onclick="livewire.emit('openModal', 'role.edit-role', {{ json_encode(['role' => $value]) }})" 
        />
    @endif

    @if (auth()->user()->can('read_role'))
        <x-button icon="eye" green label="View"  
            onclick="livewire.emit('openModal', 'role.view-role', {{ json_encode(['role' => $value]) }})" 
        />
    @endif

    @if (auth()->user()->can('delete_role'))
        <x-button icon="trash" negative label="Delete"
            onclick="livewire.emit('openModal', 'role.delete-role', {{ json_encode(['role' => $value]) }})" 
        />
    @endif
</div>