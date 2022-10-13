<div wire:ignore.self class="form-container">
    <x-card title="{{ $cardTitle }}">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
                <div class="col-span-4">
                    <x-input readonly value="{{ $subject->name }}" label="Name" placeholder="Thesis 1" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $subject->teacher_id }}" label="Teacher ID" placeholder="0" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $subject->subject_code }}" label="Subject Code" placeholder="THESCS1" />
                </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button primary icon="x" label="Close" wire:click="closeModal" />
            
            </div>
        </x-slot>
    </x-card>
</div>
