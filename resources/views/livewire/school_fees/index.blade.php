<x-app-layout>

    <div class="p-4 rounded-lg shadow-xs overflow-hidden">
        <div class="px-2 py-4 flex justify-between">
            <h2 class="text-2xl font-semibold text-gray-700">School Fees</h2>
            @can('create_school_fee')
                <livewire:fee.create-school-fee />
            @endcan
        </div>

        <div class="datatable-container max-h-screen w-full rounded-lg border shadow-xs p-2">
            <livewire:fee.fees-table />
        </div>
    </div>

</x-app-layout>