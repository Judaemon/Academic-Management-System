<div class="container">
    <x-card title="Update Contact Information">
        <form wire:submit.prevent="save">
            <div class="grid gap-4">
                <div class="">
                    <x-input wire:model.defer="emergency_contact_name" label="Emergency contact name"
                        placeholder="Type emergency contact name here" />
                </div>

                <div class="">
                    <x-input wire:model.defer="emergency_contact_relationship" label="Emergency contact relationship"
                        placeholder="Type emergency contact relationship here" />
                </div>

                <div class="">
                    <x-input wire:model.defer="emergency_contact_number" label="Emergency contact number"
                        placeholder="Type emergency contact number here" />
                </div>

                <div class="">
                    <x-input wire:model.defer="emergency_contact_address" label="Emergency contact address"
                        placeholder="Type emergency contact address here" />
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
