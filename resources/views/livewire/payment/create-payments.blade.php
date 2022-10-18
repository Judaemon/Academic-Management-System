<div wire:ignore.self>
    <x-card title="Create Payment Record">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-4">
                <div class="col-span-4">
                    <x-select
                        wire:ignore
                        rightIcon="user"
                        label="Student Name"
                        wire:model.defer="user"
                        placeholder="Select Student"
                        :async-data="route('users.students')"
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
                    <label>Payment Type</label>
                    <div class="flex col-span-4">
                        <x-select  
                            label="Options"
                            placeholder="Select payment"
                            wire:model.defer="fee"
                        >
                            @foreach ($fees as $fee)
                                <x-select.option label="{{ $fee->fee_name }}" value="{{ $fee->id }}" />
                            @endforeach
                        </x-select>
                    </div>
                    <div class="flex col-span-4">
                        <x-input label="Others" corner-hint="e.g.Exam Fee" wire:model.defer="others" />
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