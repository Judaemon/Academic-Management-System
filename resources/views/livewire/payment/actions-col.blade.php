<div>
    @can('delete_payment')
        <x-button 
          icon="trash" 
          negative 
          onclick="livewire.emit('openModal', 'payments.delete-payment', {{ json_encode(['payment' => $value]) }})"  
          label="Remove"
        />
    @endcan
    
</div>