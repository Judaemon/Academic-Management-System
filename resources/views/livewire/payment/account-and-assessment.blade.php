<div class="py-4"> 
  <div class="w-full block lg:flex justify-between space-x-0 lg:space-x-10 px-0 lg:px-8 mb-10">
    <div class="flex flex-col justify-between w-full lg:w-2/3 text-center lg:text-start mb-5 lg:mb-0">
      <div>
        <h2 class="text-3xl font-bold text-text uppercase">Accounts & Assessment</h2>
        <div class="w-full pl-10 mt-2 h-auto">
          <div class="text-base text-text uppercase">{{ $academic_year->title }}</div>
        </div>
      </div>
    </div>
    <div class="w-full lg:w-1/3">
      <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-300">
            <tr>
              <th scope="col" class="py-2.5 px-6 rounded-tl-lg">Educational Expenses</th>
              <th scope="col" class="py-2.5 px-6 rounded-tr-lg">Amount</th>
            </tr>
          </thead>
          <tbody>
            @foreach($school_fees as $fee)
              <tr class="bg-gray-50 border-b text-xs">
                <th scope="row" class="py-2 px-6 font-medium text-gray-900">
                    <span class="ml-6">{{ $fee->fee_name }}</span>
                </th>
                <td class="py-2 px-6">
                  <span class="ml-2">Php {{ number_format($fee->amount, 2) }}</span>
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr class="font-semibold bg-gray-300 text-xs text-gray-900 uppercase">
              <th scope="row" class="py-3 px-6 text-[0.7rem] rounded-bl-lg">Grand Total</th>
              <td class="py-3 px-6 rounded-br-lg">Php {{ number_format($total, 2) }}</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
 
  <div x-data="{ pay_online: false }" class="w-full px-0 lg:px-8 mb-10">
    <div class="p-4 bg-gray-200 shadow-lg rounded-lg space-y-4">
      <div class="flex items-center justify-between">
        <div class="w-3/4 flex text-base uppercase font-bold">
          <div class="w-full lg:w-1/2 pr-4">{{ $academic_year->title }}</div>
          <div class="hidden lg:block w-1/2">{{ $grade_level->name }}</div>
        </div>
        <div class="w-1/4 flex justify-end items-center">
          @if(!empty($current) && $current->count() > 0)
            <x-button wire:ignore.self primary icon="arrow-down" label="Download" wire:click="download({{ $academic_year->id }})" class="w-full" />
          @else
            <x-button primary icon="credit-card" label="Online Payment" x-on:click="pay_online = ! pay_online" class="w-full" />
          @endif
        </div>
      </div>
      @if(!empty($current) && $current->count() > 0)
        <div class="overflow-x-auto relative">
          <table class="w-full text-sm text-left text-gray-500 shadow-lg table">
            <thead class="text-xs text-white uppercase bg-black">
              <tr>
                <th scope="col" class="py-2.5 px-4 rounded-tl-lg">ID</th>
                <th scope="col" class="py-2.5 text-center">Payment Date</th>
                <th scope="col" class="py-2.5 text-center">Amount Paid</th>
                <th scope="col" class="py-2.5 text-center">Remaining Balance</th>
                <th scope="col" class="py-2.5 text-center rounded-tr-lg">Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($current as $current)
                <tr class="{{ $loop->last ? '' : 'border-b' }} bg-white">
                  <th scope="row" class="py-2 pl-4 {{ $loop->last ? 'rounded-bl-lg' : '' }}">{{ $current->id }}</th>
                  <td class="py-2 text-center">{{ $current->created_at->format('m-d-Y') }}</td>
                  <td class="py-2 text-center">Php {{ number_format($current->amount_paid, 2) }}</td>
                  <td class="py-2 text-center">Php {{ number_format($current->balance, 2) }}</td>
                  <td class="py-2 {{ $loop->last ? 'rounded-br-lg' : '' }}">
                    <div class="flex justify-center w-full">
                      <div class="w-32 py-0.5 text-center rounded-full text-[0.7rem] font-bold shadow-md uppercase 
                        {{ $current->payment_status == "Pending" ? 'bg-indigo-300 text-indigo-700' : 'bg-green-300 text-green-700' }}"
                      >
                        {{ $current->payment_status }}
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @if($latest_total->balance !== '0.00' && $current->payment_status === 'Paid')
          <div class="w-full justify-end" :class="pay_online ? 'hidden' : 'block lg:flex'">
            <x-button icon="credit-card" primary class="w-full lg:w-auto h-auto" label="Online Payment" x-on:click="pay_online = true" />
          </div>
        @else
          @if($current->payment_status === 'Pending')
            <div class="w-full block lg:flex justify-end">
              <x-button icon="x-circle" negative class="w-full lg:w-auto h-auto" label="Cancel Payment" wire:click="cancelPayment" />
            </div>
          @endif
        @endif
      @endif
      <div x-show="pay_online" class="w-full mt-12">
        <form wire:submit.prevent="save">
          <div class="flex w-full space-x-4">
            <x-select
              wire:ignore
              rightIcon="calendar"
              label="Academic Year"
              wire:model="acad_year"
              placeholder="Select Academic Year"
              :async-data="route('api.academic_year')"
              option-label="title"
              option-value="id"
              option-description="date"
              class="w-full lg:w-1/3"
            />
            <div class="w-full lg:w-1/3">
              <x-inputs.currency 
                label="Amount Paid" 
                placeholder="0.00" 
                wire:model="amount_paid" 
              />
            </div>
            <x-select
              wire:ignore 
              label="Method of Payment"  
              placeholder="Select Method"
              :options="[
                ['name' => 'GCash',  'description' => 'Not yet Available'],
                ['name' => 'PayPal',  'description' => 'Not yet Available'],
              ]"
              option-label="name"
              option-value="name"
              wire:model="method" 
              class="w-full lg:w-1/3"
            />
          </div>
          <div class="w-full flex justify-end space-x-4 mt-5">
            <x-button icon="x-circle" negative class="w-full lg:w-auto" label="Cancel" x-on:click="pay_online = false" wire:click.prevent="resetForm" />
            <x-button icon="check-circle" positive class="w-full lg:w-auto" label="Submit" wire:click.prevent="save" />
          </div>
        </form>
      </div>
    </div>
  </div>
  
  @if(!empty($history) && $history->count() > 0)
    <div class="w-full px-0 lg:px-8">
      @foreach ($school_year as $yr)
        <div x-data="{ open: false }" class="p-4 bg-gray-200 shadow-lg rounded-lg space-y-4 mb-10">
          <div class="flex items-center justify-between">
            <div class="w-3/4 flex text-base uppercase font-bold">
              <div class="w-full lg:w-1/2 pr-4">{{ $yr->title }}</div>
              <div class="hidden lg:block w-1/2">
                @foreach ($g_lvl_link as $link) 
                  @if($link->academic_year_id === $yr->id) {{ $link->grade_level->name }} @endif
                @endforeach
              </div>
            </div>
            <div class="hidden lg:flex w-1/4 justify-between items-center space-x-10">
              <x-button wire:ignore.self positive icon="table" label="View" x-on:click="open = ! open" class="w-1/2" />
              <x-button wire:ignore.self primary icon="arrow-down" label="Download" wire:click="download({{ $yr }})" class="w-1/2" />
            </div>
            <div class="flex lg:hidden w-1/4 justify-between items-center space-x-10">
              <x-button wire:ignore.self positive icon="table" x-on:click="open = ! open" class="w-1/2" />
              <x-button wire:ignore.self primary icon="arrow-down" wire:click="download" class="w-1/2" />
            </div>
          </div>
          <div x-show="open" class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500">
              <thead class="text-xs text-white uppercase bg-black">
                <tr>
                  <th scope="col" class="py-2.5 px-4 rounded-tl-lg">ID</th>
                  <th scope="col" class="py-2.5 text-center">Payment Date</th>
                  <th scope="col" class="py-2.5 text-center">Amount Paid</th>
                  <th scope="col" class="py-2.5 text-center rounded-tr-lg">Remaining Balance</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($history as $past)
                  @if($past->academic_year_id === $yr->id)
                    <tr class="{{ $loop->last ? '' : 'border-b' }} bg-white">
                      <th scope="row" class="py-2.5 pl-4">{{ $past->id }}</th>
                      <td class="py-2.5 text-center">{{ $past->created_at->format('m-d-Y') }}</td>
                      <td class="py-2.5 text-center">Php {{ number_format($past->amount_paid, 2) }}</td>
                      <td class="py-2.5 text-center">Php {{ number_format($past->balance, 2) }}</td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
              <tfoot>
                <tr class="font-semibold text-xs bg-black uppercase">
                  <th scope="row" colspan="4" class="h-9 rounded-b-lg"></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      @endforeach
    </div>
  @endif
</div>
