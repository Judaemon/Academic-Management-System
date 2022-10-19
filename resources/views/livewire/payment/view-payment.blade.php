<div wire:ignore.self>
    <x-card title="Create Payment Record">
        <div class="grid grid-cols-1 gap-4 p-4">
            <div class="col-span-4">
                <x-input label="Name" value="{{ $payment->user->firstname }} {{ $payment->user->lastname }}" read-only/>
            </div>

            <div class="col-span-4">
                <x-input label="Amount Paid" value="Php {{ $payment->amount_paid }}" read-only />
            </div>

            <div class="col-span-4">
                <div class="text-sm mb-3">Payment Type</div>
                {{-- <div class="flex col-span-4">
                    <x-select  
                        label="Options"
                        placeholder="Select payment"
                        wire:model.defer="fee_id"
                        placeholder="Select Fee"
                        :async-data="route('fees.fees')"
                        option-label="fee_name"
                        option-value="id"
                    />
                </div>
                <div class="flex col-span-4">
                    <x-input label="Others" corner-hint="e.g.Exam Fee" wire:model.defer="others" />
                </div> --}}
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button flat label="Cancel" wire:click="closeModal" />
            </div>
        </x-slot>
    </x-card>
</div>