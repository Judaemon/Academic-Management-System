<div>
    <x-button primary onclick="$openModal('modalCreate')" label="CREATE NEW " />
    
    <x-modal wire:model.defer="modalCreate" max-width="5xl">
        <x-card title="Create form">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
                <div class="col-span-4">
                    <x-input wire:model.defer="subject.firstname" label="Firstname" placeholder="John" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="subject.lastname" label="Lastname" placeholder="Doe" />
                </div>

                {{-- https://stackoverflow.com/questions/2530/how-do-you-disable-browser-autocomplete-on-web-form-field-input-tags --}}
                <div class="col-span-4">
                    <x-input autocomplete="randomshitparadimagautocomplete" wire:model.defer="subject.email" label="Email" placeholder="Doe" />
                </div>

                <div class="col-span-4">
                    <x-inputs.password  autocomplete="randomshitparadimagautocomplete" wire:model.defer="subject.password" label="Password" placeholder="Doe" />
                </div>
                {{-- read link security reason ignore nalang muna --}}
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" wire:click="$emit('closeModal')" />

                    <x-button wire:click="save" type="button" primary label="Save" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
