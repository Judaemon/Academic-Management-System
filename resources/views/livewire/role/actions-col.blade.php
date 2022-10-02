<div>
    <x-button primary onclick="Livewire.emit('openModal', 'role.view-role', {{ json_encode(['role' => $value]) }})"  label="Open " />
</div>