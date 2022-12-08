<div wire:ignore.self>
    <x-card>
        <div class="">
            <form wire:submit.prevent="refund">
                <div class="grid grid-cols-1 px-4 py-2">
                    <div class="col-span-4 mb-6 text-base"> 
                        Confirm Refund
                    </div>
                    <div class="col-span-4 mb-6"> 
                        <x-textarea
                            wire:model="reason_for_refund" 
                            label="Please enter the reason for the refund to complete the transaction." 
                            placeholder="Enter reason for refund"
                            class="w-full"
                        />
                    </div>
                    <div class="col-span-4 mb-6"> 
                        <x-inputs.password 
                            wire:model="confirm_password" 
                            label="For security, please confirm your password to continue." 
                            placeholder="Enter your password"
                            class="w-full"
                        />
                    </div>
                </div>

                <x-slot name="footer">
                    <div class="flex justify-between gap-x-4">
                        <x-button flat label="Cancel" wire:click="closeModal" />
                        <x-button wire:click.prevent="refund" type="submit" primary label="Confirm Refund" />
                    </div>
                </x-slot>
            </form>
        </div>
    </x-card>
</div>
