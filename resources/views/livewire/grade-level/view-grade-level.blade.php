<div id="view-grade-level">
    <x-card title="Viewing Grade Level">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
            <div class="col-span-12">
                <x-input readonly value="{{ $grade_level->name }}" label="Grade Level Name" placeholder="" />
            </div>

            <div class="col-span-12">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Subjects
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($grade_level->subjects as $subject)
                                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="py-4 px-6">
                                        {{ $subject->name}}
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="py-4 px-6">
                                        No subjects found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button primary icon="x" label="Close" wire:click="closeModal" />
            </div>
        </x-slot>
    </x-card>
</div>
