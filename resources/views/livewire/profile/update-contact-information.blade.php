<div class="container">
    <x-card title="Update Contact Information">
        <form wire:submit.prevent="save">
            <div class="grid gap-4">
                <div class="">
                    <x-input wire:model.defer="mobile_number" label="Mobile Number" placeholder="Type section name here" />
                </div>

                <div class="">
                    <x-input wire:model.defer="email" label="Email" placeholder="Type section name here" />
                </div>

                <div class="">
                    <x-input wire:model.defer="address" label="Address" placeholder="Type section name here" />
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" wire:click="closeModal" />
                    <x-button wire:click.prevent="save" type="submit" primary label="Save" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>
