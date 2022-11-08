<div>
  <div class="p-4 block md:flex justify-between">
    <h2 class="text-2xl font-semibold text-gray-700 w-full md:w-auto flex justify-center mb-4 md:mb-0">
      Create Payment Record
    </h2>
    <x-button icon="table" primary class="uppercase w-full md:w-auto" label="Payment Table" 
      onclick="location.href='{{ url('payments') }}'" 
    />
  </div>

  <div class="bg-white min-h-64 w-full rounded-lg border shadow-xs">
    <form wire:submit.prevent="save">
      <div class="flex items-center py-6 pl-10 pr-14 border-b bg-gray-100 rounded-t-lg">
        <span class="text-sm pl-4 w-1/12 uppercase">Name</span>
        <x-select
          wire:ignore
          rightIcon="user"
          wire:model="name"
          placeholder="Select "
          :async-data="route('users.users')"
          option-label="name"
          option-value="id"
          option-description="email"
          class="w-11/12"
        />
      </div>

      <div class="grid grid-cols-1 gap-4 w-full px-12 pb-4 pt-8">
        <div class="{{ $isNull ? 'hidden' : 'block' }} w-full">
          <h1 class="uppercase font-bold">Available Payments by Grade Level</h1>
          <div class="w-full min-h-56 flex justify-center items-center rounded-md">
            <div class="grid grid-cols-4 gap-4">
                            {{-- @if(!empty($grade_level_fees))
                                @foreach($grade_level_fees as $grade_level_fee)
                                    <div>{{ $grade_level_fee->fee_name }}</div>
                                @endforeach
                            @endif --}}
            </div>
          </div>
        </div>

        <div class="{{ $isNull ? 'hidden' : 'block' }} w-full my-4">
          <h1 class="uppercase font-bold mb-4">Past Transaction</h1>
            @if(!empty($user_payments))
              @if($user_payments->count() > 0)
                <div class="overflow-x-auto relative">
                  <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                      <tr>
                        <th scope="col" class="py-3 px-6">Payment Date</th>
                        <th scope="col" class="py-3 px-6">Payment Type</th>
                        <th scope="col" class="py-3 px-6">Amount Paid</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($user_payments as $payment)
                        <tr class="bg-white border-b">
                          <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">{{ $payment->created_at }}</th>
                          <td class="py-4 px-6">
                            <div>@if(!empty($payment->fee)) {{ $payment->school_fee }} @else {{ $payment->others }} @endif</div>
                          </td>
                          <td class="py-4 px-6">Php {{ $payment->amount_paid }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @else
                <div class="w-full min-h-64 bg-gray-200 flex justify-center items-center rounded-md">
                  <h1 class="text-gray-300 uppercase text-2xl font-extrabold tracking-wider py-10">
                    User has No Other Transactions
                  </h1>
                </div>
              @endif
            @endif
          </div>

          <div class="w-full flex flex-row space-x-10">
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
                :options="['Cash', 'GCash', 'Paypal']"
                wire:model.defer="payment_method" 
              />
            </div>
          </div>

          <div class="w-full">
            <div class="text-sm mb-2">Payment Type</div>
            <div class="{{ $isOthers ? 'hidden' : 'block'}}">
              <x-select  
                wire:ignore
                placeholder="Select Payment Options"
                wire:model="school_fee"
                :async-data="route('fees.all')"
                option-label="fee_name"
                option-value="id"
                option-description="amount"
              />
            </div>
            <div class="{{ $isOthers ? 'block' : 'hidden'}}">
              <x-input placeholder="Select Payment Options" disabled />
            </div>
            <div class="flex items-center my-4 w-full">
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

        <div class="w-full flex justify-between gap-x-4 items-center py-6 pl-10 pr-14 border-t bg-gray-100 rounded-b-lg">
          <x-button flat label="Reset Form" wire:click="resetForm" />
          <x-button wire:click.prevent="save" type="submit" primary label="Save" />
        </div>
      </div>
    </form>
  </div>
</div>