<div wire:ignore.self>
    <div class="bg-iscp_primary min-h-16 w-full rounded-t-lg px-10 py-4">
        <div class="flex justify-start items-center">
            <img src="{{ asset('images/avatar-svgrepo-com.svg') }}" class="w-20 h-20" />
            <div class="ml-10 text-white">
                <div class="text-xl uppercase font-bold tracking-wide">{{ $payment->user->firstname }}
                    {{ $payment->user->lastname }}</div>
                <div class="text-sm text-gray-300 ml-4">
                    <div class="flex mt-px items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-3.5 h-3.5 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                        {{ $payment->user->email }}
                    </div>
                    <div class="flex mt-px items-center">
                        <x-icon name="phone" class="w-3.5 h-3.5 mr-3" />
                        {{ $payment->user->mobilenumber }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="w-full text-sm px-10 py-1">
        <div class="flex w-full h-auto items-center my-4">
            <div class="font-bold w-1/4">Payment Date</div>
            <div class="w-3/4">
                <x-input value="{{ date('F j, Y', strtotime($payment->created_at)) }} " readonly />
            </div>
        </div>

        <div class="flex w-full h-auto items-center my-4">
            <div class="font-bold w-1/4">Payment Type</div>
            <div class="w-3/4">
                <x-input
                    value="@if (!empty($payment->fee_id)) {{ $payment->others }} @else {{ $payment->fee->fee_name }} ( Php {{ $payment->fee->amount }} ) @endif"
                    readonly />
            </div>
        </div>

        <div class="flex w-full h-auto items-center my-4">
            <div class="font-bold w-1/4">Amount Paid</div>
            <div class="w-3/4">
                <x-input value="Php {{ $payment->amount_paid }}" readonly />
            </div>
        </div>

        <div class="flex w-full h-auto items-center my-4">
            <div class="font-bold w-1/4">Method of Payment</div>
            <div class="w-3/4">
                <x-input value="{{ $payment->payment_method }}" readonly />
            </div>
        </div>

    </div>

    <div class="w-full bg-iscp_primary rounded-b-lg h-20 px-10">
        <div class="flex justify-between items-center gap-x-4 h-full w-full">
            <x-button green icon="receipt-refund" label="Refund" wire:click="closeModal" />
            <x-button negative icon="x-circle" label="Cancel" wire:click="closeModal" />
        </div>
    </div>
</div>
