<div wire:ignore.self>
    <x-card title="Create Payment Record">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 px-4 py-2">
                <div class="col-span-4 flex mb-5 items-center">
                    <span class="text-sm w-1/6">Name</span>
                    <x-select
                        wire:ignore
                        rightIcon="user"
                        wire:model="name"
                        placeholder="Select "
                        :async-data="route('users.users')"
                        option-label="name"
                        option-value="id"
                        option-description="email"
                        class="w-5/6"
                    />
                </div>

                <div class="{{ $isNull ? 'hidden' : 'block col-span-4 mb-5' }}">
                    @if(!empty($school_fees))
                        @if($school_fees->count() > 0)
                            <table class="w-full text-xs text-left text-gray-500 rounded-t-2">
                                <thead class="text-xs text-black uppercase bg-gray-200">
                                    <tr>
                                        <th scope="col" class="py-3 pl-2">Expenses</th>
                                        <th scope="col" class="py-3 pl-2">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($school_fees as $fee)
                                        <tr class="border-b">
                                            <th scope="row" class="py-3 font-medium text-gray-900">
                                                <span class="ml-6">{{ $fee->fee_name }}</span>
                                            </th>
                                            <td class="py-3">
                                                <span class="ml-6">Php {{ $fee->amount }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="border-b font-bold text-black">
                                        <th scope="row" class="py-3 pl-2 uppercase">Total</th>
                                        <td class="py-3 pl-2">Php total amount</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    @endif
                </div>

                <div class="col-span-4 flex flex-row space-x-10 mb-5">
                    <div class="w-1/2">
                        <x-inputs.currency 
                            label="Amount Paid" 
                            placeholder="0.00" 
                            wire:model.defer="amount_paid" 
                        />
                    </div>
                    <div class="w-1/2">
                        <x-select
                            wire:ignore 
                            label="Method of Payment"  
                            placeholder="Select Method"
                            :options="[
                                ['name' => 'Cash',  'description' => NULL],
                                ['name' => 'GCash',  'description' => 'Not yet Available'],
                                ['name' => 'PayPal',  'description' => 'Not yet Available'],
                            ]"
                            option-label="name"
                            option-value="name"
                            wire:model.defer="payment_method" 
                        />
                    </div>
                </div>

                <div class="col-span-4">
                    <div class="text-sm mb-2">Payment Type</div>
                    <div class="{{ $isOthers ? 'hidden' : 'block'}}">
                        <x-select  
                            wire:ignore
                            placeholder="Select Payment Options"
                            wire:model="school_fee"
                            :async-data="route('fees.all', ['id' => 2])"
                            option-label="fee_name"
                            option-value="id"
                            option-description="amount"
                        />
                    </div>
                    <div class="{{ $isOthers ? 'block' : 'hidden'}}">
                        <x-input placeholder="Select Payment Options" disabled />
                    </div>
                    <div class="flex items-center mt-4 w-full">
                        <x-checkbox wire:click="toggleOthers" />
                        <div class="ml-4 w-full {{ $isOthers ? 'hidden' : 'block'}}">
                            <x-input placeholder="Others" disabled />
                        </div>
                        <div class="ml-4 w-full {{ $isOthers ? 'block' : 'hidden'}}">
                            <x-input wire:model="others" placeholder="Others" class="w-full"/>
                        </div>
                    </div>
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-between gap-x-4">
                    <x-button flat label="Reset Form" wire:click="resetForm" />
                    <x-button wire:click.prevent="save" type="submit" primary label="Save" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>