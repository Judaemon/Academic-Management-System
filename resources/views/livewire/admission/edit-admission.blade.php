<div wire:ignore.self class="form-container">
    <x-card title="Update Admission">
        <form wire:submit.prevent="save">
            <div class="grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <div class="sm:col-span-1 md:col-span-4">
                    <x-input label="Student" readonly
                        value="{{ $admission->student->first_name }} {{ $admission->student->last_name }}"
                        placeholder="Select student" />
                </div>

                {{-- Student Information --}}
                <div class="sm:col-span-1 md:col-span-12 rounded-lg border shadow-xs p-2">
                    <div class="flex flex-col-reverse gap-4 md:flex-row">
                        <div class="md:grid-flow-col md:grid-cols-3 md:grid-rows-3 gap-4 grid md:w-8/12">
                            <div class="md:col-span-2 md:col-start-1 md:row-span-2">
                                <h2 class="font-semibold">{{ $admission->student->first_name }}
                                    {{ $admission->student->last_name }}</h2>
                                <p class="text-sm">{{ $admission->student->mobile_number }} |
                                    {{ $admission->student->email }}</p>
                                <p class="text-sm">{{ $admission->student->grade_level }}</p>
                            </div>
                            <div class="md:col-span-1 md:col-start-3 md:row-span-2">
                                <x-badge positive class="float-right" label="{{ $admission->student->status }}" />
                            </div>
                            <div class="md:col-span-3 md:row-span-1 md:row-start-3 flex items-stretch">
                                <p class="self-end"> ID: {{ $admission->student->id }}</p>
                            </div>
                        </div>
                        <div class="col-span-2 row-span-3 flex justify-center bg-violet-100 sm:mt-0 md:w-4/12">
                            <img class="w-8/12"
                                src="https://ui-avatars.com/api/?name={{ $admission->student->first_name }}+{{ $admission->student->last_name }}&format=svg"
                                alt="user image" />
                        </div>
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 md:grid-cols-12 sm:col-span-1 md:col-span-12 gap-4">
                    <div class="sm:col-span-1 md:col-span-4">
                        <x-input label="Enrolled by" readonly
                            value="{{ $admission->enrolled_by_user->first_name }} {{ $admission->enrolled_by_user->last_name }}"
                            placeholder="Select student" />
                    </div>

                    <div class="sm:col-span-1 md:col-span-4">
                        <x-select label="Admission status" placeholder="Select one status" :options="['Pending', 'Admitted', 'Denied', 'Canceled']"
                            wire:model.defer="admission.status" />
                    </div>
                </div>

                <div class="col-span-1 md:col-span-6">
                    <x-input label="Admit to grade level" readonly value="{{ $admission->grade_level->name }}"
                        placeholder="Select grade level" />
                </div>

                <div class="col-span-1 md:col-span-6">
                    <x-select label="Section" placeholder="Select section" wire:model="admission.section_id">
                        @foreach ($grade_level_sections as $section)
                            @if ($section['has_slot'])
                                <x-select.option label="{{ $section['name'] }}" value="{{ $section['id'] }}" />
                            @endif
                        @endforeach
                    </x-select>
                </div>

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
