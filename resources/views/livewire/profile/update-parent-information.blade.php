<div class="container">
    <x-card title="Update Contact Information">
        <form wire:submit.prevent="save">
            <div class="grid gap-4">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12">
                        <x-badge pink label="Mothers' Information" />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-input wire:model.defer="mother_name" label="Full name"
                            placeholder="Full name of user's mother" />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-input wire:model.defer="mother_number" label="Contact number"
                            placeholder="Contact number of user's father" />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-input wire:model.defer="mother_email" label="Email" placeholder="Email of user's mother" />
                    </div>

                    <div class="col-span-12 lg:col-span-6">
                        <x-input wire:model.defer="mother_address"
                            label="Address (Unit, Street, Barangay, City/Municipality)"
                            placeholder="Address of user's father" />
                    </div>
                </div>

                <!-- Father -->
                <div class="grid grid-cols-12 gap-4 mt-4">
                    <div class="col-span-12">
                        <x-badge blue label="Fathers' Information" />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-input wire:model.defer="father_name" label="Full name"
                            placeholder="Full name of user's father" />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-input wire:model.defer="father_number" label="Contact number"
                            placeholder="Contact number of user's father" />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-input wire:model.defer="father_email" label="Email"
                            placeholder="Email of student's father" />
                    </div>

                    <div class="col-span-12 lg:col-span-6">
                        <x-input wire:model.defer="father_address"
                            label="Address (Unit, Street, Barangay, City/Municipality)"
                            placeholder="Address of student's father" />
                    </div>
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
