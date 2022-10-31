<div wire:ignore.self>
    <x-card title="Create Admission">
        <form wire:submit.prevent="save">
            <div class="grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <div class="sm:col-span-1 md:col-span-4">
                    <x-select label="Student" wire:model="student_id" placeholder="Select student" :async-data="route('users.students')"
                        option-label="full_name" option-value="id" />
                </div>

                @if (empty($student))
                    <p class="md:col-span-12">Select student to continue.</p>
                @else
                    {{-- Student Information --}}
                    <div class="sm:col-span-1 md:col-span-12 rounded-lg border shadow-xs p-2">
                        <div class="flex flex-col-reverse gap-4 md:flex-row">
                            <div class="md:grid-flow-col md:grid-cols-3 md:grid-rows-3 gap-4 grid md:w-8/12">
                                <div class="md:col-span-2 md:col-start-1 md:row-span-2">
                                    <h2 class="font-semibold">{{ $student->firstname }}
                                        {{ $student->lastname }}</h2>
                                    <p class="text-sm">{{ $student->mobilenumber }} |
                                        {{ $student->email }}</p>
                                    <p class="text-sm">{{ $student->grade_level }}</p>
                                </div>
                                <div class="md:col-span-1 md:col-start-3 md:row-span-2">
                                    <x-badge positive class="float-right" label="{{ $student->status }}" />
                                </div>
                                <div class="md:col-span-3 md:row-span-1 md:row-start-3 flex items-stretch">
                                    <p class="self-end"> ID: {{ $student->id }}</p>
                                </div>
                            </div>
                            <div class="col-span-2 row-span-3 flex justify-center bg-violet-100 sm:mt-0 md:w-4/12">
                                <img class="w-8/12"
                                    src="https://ui-avatars.com/api/?name={{ $student->firstname }}+{{ $student->lastname }}&format=svg"
                                    alt="user image" />
                            </div>
                        </div>
                    </div>


                    <div class="col-span-1 md:col-span-6">
                        <x-select label="Admit to grade level" wire:model="grade_level_id"
                            placeholder="Select grade level" :async-data="route('grade_level.grade_level')" option-label="name" option-value="id" />
                    </div>
                @endif

                @if (!empty($grade_level_id))
                    <div class="col-span-1 md:col-span-6">
                        <x-select label="Section" placeholder="Select section" wire:model.defer="section_id">
                            @foreach ($grade_level_sections as $section)
                                @if ($section['has_slot'])
                                    <x-select.option label="{{ $section['name'] }}" value="{{ $section['id'] }}" />
                                @endif
                            @endforeach
                        </x-select>
                    </div>
                @endif

                <x-slot name="footer">
                    <div class="flex justify-end gap-x-4">
                        <x-button flat label="Cancel" wire:click="closeModal" />
                        <x-button wire:click.prevent="save" type="submit" primary label="Save" />
                    </div>
                </x-slot>
            </div>
        </form>
    </x-card>
</div>
