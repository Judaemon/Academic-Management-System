<div wire:ignore.self class="form-container">
    <x-card title="Edit role">
        <div class="flex gap-4">
            <div class="lg:w-4/12 mb-4">
                <x-input readonly value="{{ $role->name}}" label="Name" placeholder="Type role name here" />
            </div>
            <div class="lg:w-8/12 mb-4">
                <x-label>Selected permissions</x-label>
                <div>
                    @forelse ($role_permissions as $permission)
                        <x-badge outline dark label="{{ $permission}}" />
                    @empty
                        <x-badge outline dark label="Select permission" />
                    @endforelse
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button primary icon="x" label="Close" wire:click="closeModal" />
            </div>
        </x-slot>
    </x-card>
</div>
