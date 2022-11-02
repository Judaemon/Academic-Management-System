<div wire:ignore.self>
    <div class="bg-iscp_primary min-h-20 w-full rounded-t-lg px-10 py-4">
        <div class="flex justify-start items-center">
            <div class="rounded-full h-16 w-16 text-black bg-gradient-to-r from-[#FF5F1F] to-[#FDBD01] p-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46" />
            </svg>         
            </div>     
            <div class="ml-10 text-white">
                <div class="text-xl uppercase font-bold tracking-wide">{{ $announcement->title }}</div>
            </div>
        </div>
    </div>

        
    <div class="w-full text-sm px-10 py-1">
        <div class="w-full font-bold h-auto items-center my-4 flex justify-end items-align">
            {{ date('F j, Y', strtotime($announcement->date)) }}
        </div>

        <div class="w-full h-auto items-center my-4">
            <div class="font-bold uppercase text-base">Description</div>
            <div class="my-4">
                {{ $announcement->description }}
            </div>
        </div>

        @if(!empty($announcement->main_image))
            <div class="w-full h-auto items-center my-4">
                <img src="" alt="{{ $announcement->title }}">
            </div>
        @endif

    </div>

    <div class="w-full bg-iscp_primary rounded-b-lg h-20 px-10">
        <div class="flex justify-end items-center gap-x-4 h-full w-full">
            <x-button negative icon="x-circle" label="Cancel" wire:click="closeModal" />
        </div>
    </div>
</div>
