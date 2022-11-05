<div class="flex flex-row space-x-2">
    <x-button icon="pencil" info label="Edit"
        onclick="livewire.emit('openModal', 'admission.edit-admission', {{ json_encode(['admission' => $value]) }})" />

    <x-button icon="eye" green label="View"
        onclick="livewire.emit('openModal', 'admission.view-admission', {{ json_encode(['admission' => $value]) }})" />

    <x-button icon="trash" negative label="Delete"
        onclick="livewire.emit('openModal', 'admission.delete-admission', {{ json_encode(['admission' => $value]) }})" />
</div>
