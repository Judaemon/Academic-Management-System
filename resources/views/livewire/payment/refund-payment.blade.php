<div wire:ignore.self>
    <x-card>
        <form wire:submit.prevent="refund">
            <div class="grid grid-cols-1 px-4 py-2">
                <div class="col-span-4 mb-6 text-base"> 
                    Confirm Password
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
                    <x-button wire:click.prevent="refund" type="submit" primary label="Confirm Password" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>
