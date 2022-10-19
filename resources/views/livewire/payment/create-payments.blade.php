<div wire:ignore.self>
    <x-card title="Create Payment Record">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-4 p-4">
                <div class="col-span-4">
                    <x-select
                        wire:ignore
                        rightIcon="user"
                        label="Name"
                        wire:model.defer="user"
                        placeholder="Select Student"
                        :async-data="route('users.users')"
                        option-label="name"
                        option-value="id"
                        option-description="email"
                    />
                </div>

                <div class="col-span-4">
                    <x-inputs.currency 
                        label="Amount Paid" 
                        placeholder="0.00" 
                        wire:model.defer="amount_paid" 
                    />
                </div>

                <div class="col-span-4">
                    <div class="text-sm mb-3">Payment Type</div>
                    <div class="flex items-center mb-4">
                        {{-- <input id="fee_types" type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"> --}}
                        <label for="fee_types" class="flex flex-row space-x-4 items-center col-span-4 grow">
                            <span class="text-sm pl-4 w-1/5">Fee Options</span>
                            <x-select  
                                wire:ignore
                                placeholder="Select Payment Options"
                                wire:model.defer="fee"
                                :async-data="route('fees.all')"
                                option-label="fee_name"
                                option-value="id"
                                option-description="amount"
                                class="w-4/5"
                            />
                        </label>
                    </div>
                    <div class="flex items-center mb-4 bg-red-500">
                        <input id="others_type" type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="others_type" class="flex flex-row space-x-4 items-center col-span-4 grow bg-red-200">
                            <span class="text-sm pl-4 w-1/5">Others</span>
                            <x-input wire:model.defer="others" class="w-full"/>
                        </label>
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