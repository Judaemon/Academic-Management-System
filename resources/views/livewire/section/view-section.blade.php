<div wire:ignore.self>
    <x-card title="View Section">
        <form wire:submit.prevent="save">
            <div class="sm:grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $section->name }}" label="Name" placeholder="Type section name here" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $section->capacity }}" label="Capacity" placeholder="15" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-select label="Teacher" wire:model.defer="section.teacher_id" placeholder="Select teacher"
                        :async-data="route('users.teachers')" option-label="full_name" option-value="id" readonly />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-select label="Grade level" wire:model="section.grade_level_id" placeholder="Select grade level"
                        :async-data="route('grade_level.grade_level')" option-label="name" option-value="id" readonly />
                </div>

                <div class="sm:col-span-2 md:col-span-12">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Subjects
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($grade_level_subjects as $subject)
                                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="py-4 px-6">
                                            {{ $subject->name }}
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
        </form>
    </x-card>
</div>
