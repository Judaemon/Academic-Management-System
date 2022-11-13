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
            placeholder="Select Users"
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
                      <th scope="row" class="py-3 font-medium text-gray-900"><span class="ml-6">{{ $fee->fee_name }}</span></th>
                      <td class="py-3"><span class="ml-6">Php {{ number_format($fee->amount, 2) }}</span></td>
                    </tr>
                  @endforeach
                  <tr class="border-b font-bold text-black">
                    <th scope="row" class="py-3 pl-2 uppercase">Total</th>
                    <td class="py-3 pl-2 uppercase">Php {{ number_format($total, 2) }}</td>
                  </tr>
                </tbody>
              </table>
            @endif
          @endif
        </div>

        <div class="col-span-4 mb-5">
          <div class="text-sm mb-2">Payment Options</div>
          <div class="flex flex-col space-y-2 ml-4">
            @if(!empty($total))
              <div>
                @if(!empty($payment_history_latest) && $payment_history_latest->balance === '0.00')
                  <div class="flex">
                    <x-radio id="radio" disabled />
                    <span class="ml-2 py-0.5 px-4 shadow-md rounded-full bg-green-200 text-green-500 font-semibold text-xs ">
                      Fully Paid on {{ date('F j, Y', strtotime($payment_history_latest->created_at)) }}
                    </span>
                  </div>
                @else
                  <x-radio id="radio" label="Pay By Total" wire:model="payment_options" value="by total" />
                @endif

                @if(!empty($payment_history) && !empty($payment_history_latest))
                  <div class="pl-6 {{ $payment_history_latest->balance !== '0.00' ? 'block' : 'hidden' }}">
                    @if($payment_history->count() > 0)
                      <table class="w-full text-xs text-left text-gray-500 rounded-t-2 my-2">
                        <thead class=" text-[0.7rem] text-black uppercase bg-gray-200">
                          <tr>
                            <th scope="col" class="py-2 pl-2">Payment Date</th>
                            <th scope="col" class="py-2 text-center">Amount Paid</th>
                            <th scope="col" class="py-2 text-center">Balance</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($payment_history as $payment)
                            <tr class="border-b">
                              <th scope="row" class="py-2 pl-4">{{ $payment->created_at->format('m-d-Y') }}</th>
                              <td class="py-2 text-center">Php {{ number_format($payment->amount_paid, 2) }}</td>
                              <td class="py-2 text-center">Php {{ number_format($payment->balance, 2) }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    @endif
                  </div>
                @endif
              </div>
            @endif

            <div>
              <x-radio id="radio" label="School Fees" wire:model="payment_options" value="other fees" />
              <div class="pl-6 mt-2 w-full {{ $payment_options === 'other fees' ? 'block' : 'hidden'}}">
                <x-select  
                  wire:ignore
                  placeholder="Select School Fees"
                  wire:model="school_fee"
                  :async-data="route('other.fees')"
                  option-label="fee_name"
                  option-value="id"
                  option-description="amount"
                />
              </div>
            </div>
            
            <div>
              <x-radio id="radio" label="Others" wire:model="payment_options" value="others" />
              <div class="pl-6 mt-2 w-full {{ $payment_options === 'others' ? 'block' : 'hidden'}}">
                <x-input wire:model="others" placeholder="Please Specify" class="w-full"/>
              </div>
            </div>
          </div>
        </div>

        <div class="col-span-4 flex flex-row mb-5">
          <div class="{{ !empty($payment_options) ? 'w-1/2 block mr-10' : 'hidden' }}">
            <x-inputs.currency label="Amount Paid" placeholder="0.00" wire:model="amount_paid" />
          </div>
          <div class="{{ !empty($payment_options) ? 'hidden' : 'w-1/2 block mr-10' }}">
            <x-inputs.currency label="Amount Paid" placeholder="0.00" disabled />
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
      </div>

      <x-slot name="footer">
        <div class="flex justify-between gap-x-4">
          <x-button flat label="Cancel" wire:click="closeModal" />
          <x-button wire:click.prevent="save" type="submit" primary label="Save" />
        </div>
      </x-slot>
    </form>
  </x-card>
</div>