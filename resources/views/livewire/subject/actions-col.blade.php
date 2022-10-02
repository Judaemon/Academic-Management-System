<div>
    <x-button primary onclick="Livewire.emit('openModal', 'subject.open-subject', {{ json_encode(['subject' => $value]) }})"  label="Open " />
</div>