<div>
    <x-button primary onclick="Livewire.emit('openModal', 'user.open-user', {{ json_encode(['user' => $value]) }})"  label="Open " />
</div>