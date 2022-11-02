<x-app-layout>
    <div class="mb-4 p-4 flex justify-between">
        <h1 class="text-2xl font-semibold text-gray-700">Dashboard</h1>

        <div class="flex justify-end gap-x-2">
            {{-- action btns --}}
        </div>
    </div>

    <div class="px-10 py-4">
        <div class="flex flex-col p-8 bg-white shadow-md border-2 border-iscp_primary hover:shadow-lg rounded-2xl">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-16 h-16 rounded-2xl p-3 border border-blue-100 text-blue-400 bg-blue-50" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="flex flex-col ml-3">
                        <div class="font-medium leading-none">Delete Your Acccount ?</div>
                        <p class="text-sm text-gray-600 leading-none mt-1">By deleting your account you will lose your all data
                        </p>
                    </div>
                </div>
                <button  class="flex-no-shrink bg-red-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-full">Read More</button>
            </div>
        </div>
    </div>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <h2>You are logged in!</h2>
    </div>
</x-app-layout>
