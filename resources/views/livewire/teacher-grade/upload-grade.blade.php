<div class="container">
    <x-card title="Assign Grades">
        <form>
            <div class="form-container grid grid-cols-12 gap-4">
                <div class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Student" />
                    <div class="grid grid-cols-12 gap-2 lg:gap-4">
                        <div class="col-span-12 md:col-span-6 lg:col-span-5">
                            <x-input readonly
                                value="{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}"
                                label="Student Name" placeholder="" />
                        </div>
                    </div>
                </div>


                <div class="col-span-12 grid grid-cols-12 gap-4 gap-y-0">
                    <div class="col-span-12">
                        <div class="grid grid-cols-12 gap-4">
                            <div class="container col-span-12 md:col-span-4">
                                <x-badge class="w-full mb-2" dark md label="Subjects" />
                            </div>

                            <div class="container col-span-12 md:col-span-8">
                                <x-badge class="w-full mb-2" dark md label="Quarters" />
                            </div>
                        </div>
                    </div>

                    @foreach ($grades as $index => $grade)
                        <div class="container col-span-12 md:col-span-4">
                            <div class="gap-2 lg:gap-4">
                                <div class="col-span-4 md:col-span-4 lg:col-span-4 py-2">
                                    <x-input readonly value="{{ $grade->subject->name }}" label=""
                                        placeholder="" />
                                </div>
                            </div>
                        </div>
                        {{-- {{ $subjects[$index]->grades->student->first_name }} --}}

                        <div class="container col-span-12 md:col-span-8">
                            <div class="grid grid-cols-12 gap-8 lg:gap-4">
                                <div class="col-span-2 md:col-span-8 lg:col-span-3 py-2 px-2">
                                    <x-input wire:model.defer="grades.{{ $index }}.first_quarter"
                                        placeholder="1st" />
                                    {{ $grades[$index]->student->first_name }}
                                </div>
                                <div class="col-span-2 md:col-span-8 lg:col-span-3 py-2 px-2">
                                    <x-input wire:model.defer="grades.{{ $index }}.second_quarter"
                                        placeholder="2nd" />
                                </div>
                                <div class="col-span-2 md:col-span-8 lg:col-span-3 py-2 px-2">
                                    <x-input wire:model.defer="grades.{{ $index }}.third_quarter"
                                        placeholder="3rd" />
                                </div>
                                <div class="col-span-2 md:col-span-8 lg:col-span-3 py-2 px-2">
                                    <x-input wire:model.defer="grades.{{ $index }}.fourth_quarter"
                                        placeholder="4th" />
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-between gap-x-4">
                    <x-button flat label="Cancel" wire:click="closeModal" />

                    <x-button wire:click="save1" type="button" primary label="Save" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>
