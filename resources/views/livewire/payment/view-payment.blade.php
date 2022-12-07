<div wire:ignore.self>
    <div wire:loading.flex wire:target="update">
        <div class="w-full h-96 flex justify-center items-center space-y-8">
            <div>
                <div class="w-full flex justify-center pb-10">
                    <div style="color:#012560" class="la-line-spin-clockwise-fade la-3x">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>  
                </div>
                <div class="text-center text-lg md:text-2xl font-bold uppercase">Processing Payment....</div>
            </div>
        </div>
    </div>

    <div wire:loading.class="hidden" wire:target="update">
        <div class="bg-iscp_primary min-h-16 w-full rounded-t-lg px-10 py-4">
            <div class="flex justify-start items-center">
                <img src="{{ asset('images/avatar-svgrepo-com.svg') }}" class="w-20 h-20" />
                <div class="ml-10 text-white w-1/2">
                    <div class="text-xl uppercase font-bold tracking-wide">
                        {{ $payment->user->first_name }} {{ $payment->user->last_name }}
                    </div>
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
                            {{ $payment->user->mobile_number }}
                        </div>
                    </div>
                </div>
                <div class="ml-10 text-white w-1/2">
                    <div class="text-sm text-gray-300 ml-4">
                        <div class="flex mt-px items-center">
                            <span class="font-bold mr-4">Order No :</span>
                            {{ $payment->id }}
                        </div>
                        <div class="flex mt-px items-center">
                            <span class="font-bold mr-4">Payment Date :</span>
                            {{ date('F j, Y', strtotime($payment->created_at)) }}
                        </div>
                        <div class="flex mt-px items-center">
                            <div class="w-1/4 md:w-1/5 lg:w-1/6 font-bold mr-4">Status :</div>
                            <div class="w-3/4 md:w-4/5 lg:w-5/6 py-1 text-center rounded-full font-bold text-sm shadow-md uppercase {{ ($status == 'Pending') ? 'bg-indigo-300 text-indigo-700' : 
                                (($status == 'Paid') ? 'bg-green-300 text-green-700' : 'bg-orange-300 text-orange-700') }}">
                                {{ $payment->payment_status }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full text-sm px-10 py-1">
            @if(!empty($school_fees) && $payment->fee_id === NULL)
                @if($school_fees->count() > 0)
                    <table class="w-full text-xs text-left text-gray-500 rounded-t-2">
                        <thead class="text-[0.7rem] text-black uppercase bg-gray-200">
                            <tr>
                                <th scope="col" class="py-3 pl-2">Educational Expenses</th>
                                <th scope="col" class="py-3 pl-2">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($school_fees as $fee)
                                <tr class="border-b">
                                    <th scope="row" class="py-2 font-medium text-gray-900">
                                        <span class="ml-6">{{ $fee->fee_name }}</span>
                                    </th>
                                    <td class="py-2">
                                        <span class="ml-6">Php {{ number_format($fee->amount, 2) }}</span>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="border-b font-bold text-black">
                                <th scope="row" class="py-2 pl-2 uppercase">Grand Total</th>
                                <td class="py-2 pl-2 uppercase">Php {{ number_format($total, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                @endif
            @endif

            <div class="flex w-full h-auto items-center my-4">
                <div class="font-bold w-1/4">Payment Type</div>
                <div class="w-3/4">
                    @if (!empty($payment->fee_id))
                        <x-input value="{{ $payment->fee->fee_name }} ( Php {{ $payment->fee->amount }} )" readonly />
                    @else
                        <x-input value="{{ $payment->others }}" readonly />
                    @endif
                </div>
            </div>

            @if(!empty($history) && $payment->fee_id === NULL && $payment->payment_status !== "Refunded")
                @if($history->count() > 0)
                    <table class="w-full text-xs text-left text-gray-500 rounded-t-2 my-2">
                        <thead class=" text-[0.7rem] text-black uppercase bg-gray-200">
                            <tr>
                                <th scope="col" class="py-2 pl-2">Payment Date</th>
                                <th scope="col" class="py-2 text-center">Amount Paid</th>
                                <th scope="col" class="py-2 text-center">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($history as $payment)
                                <tr class="border-b">
                                    <th scope="row" class="py-2 pl-4">{{ $payment->created_at->format('m-d-Y') }}</th>
                                    <td class="py-2 text-center">Php {{ number_format($payment->amount_paid, 2) }}</td>
                                    <td class="py-2 text-center">Php {{ number_format($payment->balance, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            @endif

            <div class="flex w-full h-auto items-center my-4">
                <div class="font-bold w-1/4">Amount Paid</div>
                <div class="w-3/4">
                    <x-input value="Php {{ number_format($payment->amount_paid, 2) }}" readonly />
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
                <div class="flex gap-x-4 w-1/2">
                    @if($status === "Pending")
                        <x-button green icon="check-circle" label="Confirm Payment" wire:click="confirmPayment" />
                    @else
                        <x-button info icon="arrow-down" label="Download" wire:click="download" />
                    @endif
                </div>
                <x-button negative icon="x-circle" label="Close" wire:click="closeModal" />
            </div>
        </div>
    </div>
</div>
