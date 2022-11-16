<div wire:ignore.self>
  <div wire:loading.flex wire:target="submit">
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

  <div wire:loading.class="hidden" wire:target="submit">
    <x-card title="Create Payment Record">
      <form wire:submit.prevent="save">
        <div class="grid grid-cols-1 px-4 py-2">
          <div class="col-span-4 block lg:flex flex-row space-x-0 lg:space-x-10 mb-8 items-center">
            <div class="w-full lg:w-1/2 mb-5 lg:mb-0 block lg:flex items-center">
              <div class="text-sm w-full lg:w-1/6 mb-1 lg:mb-0">Name</div>
              <x-select
                wire:ignore
                rightIcon="user"
                wire:model="name"
                placeholder="Select Users"
                :async-data="route('users.users')"
                option-label="name"
                option-value="id"
                option-description="email"
                class="w-full lg:w-5/6"
              />
            </div>
            <div class="w-full lg:w-1/2 block lg:flex items-center mr-0 lg:mr-4">
              <div class="text-sm w-full lg:w-1/3 mb-1 lg:mb-0">Academic Year</div>
              <x-select
                wire:ignore
                rightIcon="calendar"
                wire:model="academic_year"
                placeholder="Select Academic Year"
                :async-data="route('api.academic_year')"
                option-label="title"
                option-value="id"
                option-description="date"
                class="w-full lg:w-2/3"
              />
            </div>
          </div>

          @if(!empty($school_fees))
            <div class="block col-span-4 mb-8">
              @if($school_fees->count() > 0)
                <table class="w-full text-xs text-left text-gray-500 rounded-t-2">
                  <thead class="text-xs text-black uppercase bg-gray-200">
                    <tr>
                      <th scope="col" class="py-3 pl-2">Educational Expenses</th>
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
                      <th scope="row" class="py-3 pl-2 uppercase">Grand Total</th>
                      <td class="py-3 pl-2 uppercase">Php {{ number_format($total, 2) }}</td>
                    </tr>
                  </tbody>
                </table>
              @endif
            </div>
          @endif

          <div class="col-span-4 mb-6">
            <div class="text-sm uppercase mb-3">In Payment of</div>
            <div class="flex flex-col space-y-2 ml-4">
              @if(!empty($total))
                <div>
                  @if(!empty($latest) && $latest->balance === '0.00' && $latest->payment_status !== "Refunded")
                    <div class="flex">
                      <x-radio id="radio" disabled />
                      <span class="ml-2 py-0.5 px-4 shadow-md rounded-full bg-green-200 text-green-500 font-semibold text-xs ">
                        Fully Paid on {{ date('F j, Y', strtotime($latest->created_at)) }}
                      </span>
                    </div>
                  @else
                    <x-radio id="radio" label="Total Fee (By Grade Level)" wire:model="options" value="total fee" />
                  @endif

                  @if(!empty($history) && !empty($latest))
                    <div class="pl-6 {{ $latest->balance !== '0.00' ? 'block' : 'hidden' }}">
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
                    </div>
                  @endif
                </div>
              @endif

              <div>
                <x-radio id="radio" label="School Fees" wire:model="options" value="other fees" />
                <div class="pl-6 mt-2 w-full {{ $options === 'other fees' ? 'block' : 'hidden'}}">
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
                <x-radio id="radio" label="Others" wire:model="options" value="others" />
                <div class="pl-6 mt-2 w-full {{ $options === 'others' ? 'block' : 'hidden'}}">
                  <x-input wire:model="others" placeholder="Please Specify" class="w-full"/>
                </div>
              </div>
            </div>
          </div>

          <div class="col-span-4 block lg:flex flex-row mb-5">
            <div class="{{ !empty($options) ? 'w-full lg:w-1/2 block mr-10 mb-5 lg:mb-0' : 'hidden' }}">
              <x-inputs.currency label="Amount Paid" placeholder="0.00" wire:model="amount_paid" />
            </div>
            <div class="{{ !empty($options) ? 'hidden' : 'w-full lg:w-1/2 block mr-10 mb-5 lg:mb-0' }}">
              <x-inputs.currency label="Amount Paid" placeholder="0.00" disabled />
            </div>
            <div class="w-full lg:w-1/2">
              <x-select
                wire:ignore 
                label="Method of Payment"  
                placeholder="Select Method"
                :options="[
                  ['name' => 'Over the Counter',  'description' => NULL],
                  ['name' => 'GCash',  'description' => 'Not yet Available'],
                  ['name' => 'PayPal',  'description' => 'Not yet Available'],
                ]"
                option-label="name"
                option-value="name"
                wire:model="method" 
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
</div>