<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
    <!-- Modal header -->
    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            {{ $academic_year->year }}
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" wire:click="$emit('closeModal')">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Close modal</span>
        </button>
    </div>
    <!-- Modal body -->
    <div class="p-6 space-y-6">
        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
            {{ $academic_year->curriculum }}
        </p>
    </div>
    <!-- Modal footer -->
    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
        @can('edit_academic_year')
            <x-button 
              icon="pencil" 
              info 
              onclick="livewire.emit('openModal', 'academic-year.edit-academic-year', {{ json_encode(['academic_year' => $academic_year->id]) }})" 
              label="Edit" 
            />
        @elsecan('delete_academic_year')
            <x-button 
              icon="trash" 
              negative 
              onclick="#"  
              label="Remove"
            />
        @endcan
    </div>
</div>
