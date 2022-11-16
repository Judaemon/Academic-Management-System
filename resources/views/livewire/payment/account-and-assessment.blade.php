<div class="py-4"> 
  <div class="w-full block lg:flex justify-between px-0 lg:px-8 mb-10">
    <div class="w-full lg:w-2/3 text-center lg:text-start">
      <h2 class="text-3xl font-bold text-text uppercase">Accounts & Assessment</h2>
      <div class="w-full pl-10 mt-2 h-auto">
        <div class="text-base text-text uppercase">{{ $academic_year->title }}</div>
      </div>
    </div>
    <div class="w-full lg:w-1/3">
      <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-300">
            <tr>
              <th scope="col" class="py-2.5 px-6">Educational Expenses</th>
              <th scope="col" class="py-2.5 px-6">Amount</th>
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
              <th scope="row" class="py-3 px-6 text-[0.7rem]">Grand Total</th>
              <td class="py-3 px-6">Php {{ number_format($total, 2) }}</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>

  @if(!empty($current))
    <div class="w-full px-0 lg:px-8 mb-10">
      <div class="p-4 bg-gray-50 shadow-lg rounded-lg space-y-4">
        <div class="flex items-center justify-between">
          <div class="w-3/4 flex text-base uppercase font-bold">
            <div class="w-full lg:w-1/2 pr-4">{{ $academic_year->title }}</div>
            <div class="hidden lg:block w-1/2">{{ $grade_level->name }}</div>
          </div>
          <div class="flex w-1/4 justify-end items-center">
            <x-button wire:ignore.self info icon="arrow-down" label="Download" wire:click="download" class="w-1/3" />
          </div>
        </div>
        <div class="overflow-x-auto relative">
          <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase rounded-t-lg bg-gray-300">
              <tr>
                <th scope="col" class="py-2.5 px-4">ID</th>
                <th scope="col" class="py-2.5 text-center">Payment Date</th>
                <th scope="col" class="py-2.5 text-center">Amount Paid</th>
                <th scope="col" class="py-2.5 text-center">Remaining Balance</th>
              </tr>
            </thead>
            <tbody>
              @foreach($current as $current)
                <tr class="border-b">
                  <th scope="row" class="py-2 pl-4">{{ $current->id }}</th>
                  <td class="py-2 text-center">{{ $current->created_at->format('m-d-Y') }}</td>
                  <td class="py-2 text-center">Php {{ number_format($current->amount_paid, 2) }}</td>
                  <td class="py-2 text-center">Php {{ number_format($current->balance, 2) }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @endif

  <div class="w-full px-0 lg:px-8">
    @foreach ($history as $history)
      <div x-data="{ open: false }" class="p-4 bg-gray-50 shadow-lg rounded-lg space-y-4 mb-10">
        <div class="flex items-center justify-between">
          <div class="w-3/4 flex text-base uppercase font-bold">
            <div class="w-full lg:w-1/2 pr-4">{{ $history->academic_year->title }}</div>
            <div class="hidden lg:block w-1/2">{{ $grade_level->name }}</div>
          </div>
          <div class="hidden lg:flex w-1/4 justify-between items-center space-x-10">
            <x-button wire:ignore.self positive icon="table" label="View" x-on:click="open = ! open" class="w-1/2" />
            <x-button wire:ignore.self info icon="arrow-down" label="Download" wire:click="download" class="w-1/2" />
          </div>
          <div class="flex lg:hidden w-1/4 justify-between items-center space-x-10">
            <x-button wire:ignore.self positive icon="table" x-on:click="open = ! open" class="w-1/2" />
            <x-button wire:ignore.self info icon="arrow-down" wire:click="download" class="w-1/2" />
          </div>
        </div>
        <div x-show="open" class="overflow-x-auto relative">
          <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase rounded-t-lg bg-gray-300">
              <tr>
                <th scope="col" class="py-2.5 px-4">ID</th>
                <th scope="col" class="py-2.5 text-center">Payment Date</th>
                <th scope="col" class="py-2.5 text-center">Amount Paid</th>
                <th scope="col" class="py-2.5 text-center">Remaining Balance</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b">
                <th scope="row" class="py-2 pl-4">{{ $history->id }}</th>
                <td class="py-2 text-center">{{ $history->created_at->format('m-d-Y') }}</td>
                <td class="py-2 text-center">Php {{ number_format($history->amount_paid, 2) }}</td>
                <td class="py-2 text-center">Php {{ number_format($history->balance, 2) }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    @endforeach
  </div>
</div>
