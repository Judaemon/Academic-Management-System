<div class="container mt-4">
    <div class="lg:flex">
        <div class="mb-2 lg:w-1/3 lg:pr-4">
            <h2 class="text-lg font-medium text-text">Institute Profile</h2>
            <p class=" text-sm text-text">Lorem ipsum dolor sit, nobis ea?</p>
        </div>

        <div class="bg-bg p-4 lg:w-2/3 rounded-md">
            <div class="grid grid-cols-6">
                <div class="col-span-6 md:col-span-4">
                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Institute name</label>
                        <div>
                            <div class="w-full">
                                <x-input wire:model.defer="setting.institute_name" placeholder="Name of institute" />
                            </div>

                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Institute acronym</label>
                        <div>
                            <x-input wire:model.defer="setting.institute_acronym" placeholder="Acronym of institute" />
                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Institute logo</label>
                        <div>
                            <x-label>
                                <div>
                                    <input type="file" wire:model="logo">

                                    @error('logo')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </x-label>
                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">School address</label>
                        <div>
                            <x-input wire:model.defer="setting.address" placeholder="Address of school" />
                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Academic Year</label>
                        <div>
                            <x-select wire:model.defer="academic_year" placeholder="Select academic year">
                                @foreach ($academic_years as $academic_year)
                                    {{ $academic_year->id }}
                                    {{-- <x-select.option value="{{ $academic_year->id }}" --}}
                                    {{-- label="{{ $academic_year->start_year->format('Y') }} - {{ $academic_year->end_year }}" /> --}}
                                    label="{{ date('Y', strtotime($academic_year->start_year)) }} - {{ date('Y', strtotime($academic_year->end_year)) }}"
                                    />
                                @endforeach
                            </x-select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-12 flex justify-end">
                <x-button wire:click="save" type="button" icon="shield-check" negative label="Save" />
            </div>
        </div>
    </div>
</div>
