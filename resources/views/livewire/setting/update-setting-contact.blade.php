<div class="container mt-4">
    <div class="lg:flex">
        <div class="mb-2 lg:w-1/3 lg:pr-4">
            <h2 class="text-lg font-medium text-text">Contact Information</h2>
            <p class=" text-sm text-text">Update the institute's contact information.</p>
        </div>

        <div class="bg-bg p-4 lg:w-2/3 rounded-md">
            <div class="grid grid-cols-6">
                <div class="col-span-6 md:col-span-4">
                    <div class="max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Email</label>
                        <div>
                            <x-input wire:model.defer="email" placeholder="caims@gmail.com" />
                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Contact number 1</label>
                        <div>
                            <x-input wire:model.defer="mobile_1" placeholder="Contact number 1" />


                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Contact number 2</label>
                        <div>
                            <x-input wire:model.defer="mobile_2" placeholder="Contact number 2" />
                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">School telephone</label>
                        <div>
                            <x-input wire:model.defer="telephone_1" placeholder="School telephone" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-12 flex justify-end">
                <x-button wire:click="save" type="button" icon="shield-check" negative label="Save" />
            </div>
        </div>
    </div>
</div>
