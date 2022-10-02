<div>
    <x-button primary onclick="Livewire.emit('openModal', 'section.open-section', {{ json_encode(['section' => $value]) }})"  label="Open " />
</div>