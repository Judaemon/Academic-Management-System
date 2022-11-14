<x-app-layout>
    @if (empty(Auth::user()->password_changed_at))
    @endif

    <div class="mb-4 p-4 flex justify-between">
        <h1 class="text-2xl font-semibold text-main">Dashboard</h1>

        <div class="flex justify-end gap-x-2 w-">
            {{-- action buttons --}}
        </div>
    </div>

    @foreach ($announcements as $announcement)
        <div class="px-10 py-2">
            <div class="flex flex-col p-4 bg-white shadow-md border-2 border-iscp_primary hover:shadow-lg rounded-2xl">
                <div class="flex items-center justify-between">
                    <div class="flex justify-start items-center w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-20 h-20 rounded-2xl p-3 text-white bg-iscp_primary">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46" />
                        </svg>
                        <div class="flex flex-col pl-5 items-center justify-start w-full">
                            <div class="text-xs leading-none w-full mb-3">
                                {{ date('F j, Y', strtotime($announcement->start_date)) }} to
                                {{ date('F j, Y', strtotime($announcement->end_date)) }}</div>
                            <div class="font-bold text-lg w-full leading-none ml-4 uppercase">{{ $announcement->title }}
                            </div>
                            <p class="text-sm text-gray-600 leading-none mt-3">{{ $announcement->description }}
                            </p>
                        </div>
                    </div>
                    <div class="w-40 flex justify-center items-center">
                        <x-button wire:ignore.self negative label="Read More"
                            onclick="livewire.emit('openModal', 'announcement.view-announcement', {{ json_encode(['announcement' => $announcement]) }})" />
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <h2 class="">You are logged in!</h2>
    </div>
</x-app-layout>
