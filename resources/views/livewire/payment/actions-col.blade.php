<div>
    @can('edit_payment')
        <x-button 
          icon="pencil" 
          info 
          onclick="livewire.emit('openModal', 'payments.edit-payment', {{ json_encode(['payment' => $value]) }})" 
          label="Edit" 
        />    
    @elsecan('delete_payment')
        <x-button 
          icon="trash" 
          negative 
          onclick="#"  
          label="Remove"
        />
    @endcan
    
</div>