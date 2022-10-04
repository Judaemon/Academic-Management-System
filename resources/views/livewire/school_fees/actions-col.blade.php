<div>
    @can('edit_school_fee')
        <x-button 
          icon="pencil" 
          info 
          onclick="livewire.emit('openModal', 'fee.edit-school-fee', {{ json_encode(['school_fee' => $value]) }})" 
          label="Edit" 
        />
    @elsecan('create', App\Models\Post::class)
        <x-button 
          icon="trash" 
          negative 
          onclick="#"  
          label="Remove"
        />
    @endcan
</div>