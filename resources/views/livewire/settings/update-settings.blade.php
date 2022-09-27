<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
    <div class="col-span-4">
        <x-input wire:model.defer="setting.system_name" label="System Name" placeholder="System Name" />
    </div>

    <div class="col-span-4">
        <x-input wire:model.defer="setting.school_name" label="School name" placeholder="School name" />
    </div>

    <div class="col-span-4">
        {{-- Change To file upload --}}
        <x-input wire:model.defer="setting.logo" label="School logo" placeholder="School logo path" />
    </div>

    <div class="col-span-4">
        <x-input wire:model.defer="setting.address" label="School address" placeholder="School address" />
    </div>

    <div class="col-span-4">
        <x-input wire:model.defer="setting.mobile_1" label="Contact number 1" placeholder="Contact number 1" />
    </div>

    <div class="col-span-4">
        <x-input wire:model.defer="setting.mobile_2" label="Contact number 2" placeholder="Contact number 2" />
    </div>

    <div class="col-span-4">
        <x-input wire:model.defer="setting.telephone_1" label="School telephone" placeholder="School telephone" />
    </div>

    <div class="col-span-12 flex justify-end">
        <x-button wire:click="save" type="button" primary label="Update" />
    </div>
</div>
