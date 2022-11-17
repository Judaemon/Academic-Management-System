<div class="container mt-4">
    <div class="lg:flex">
        <div class="mb-2 lg:w-1/3 lg:pr-4">
            <h2 class="text-lg font-medium text-text">Institute Profile</h2>
            <p class=" text-sm text-text">Update your Institute's profile information, physical address, and select the current academic year</p>
        </div>

        <div class="bg-bg p-4 lg:w-2/3 rounded-md">
            <div class="grid grid-cols-6">
                <div class="col-span-6 md:col-span-4">
                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Institute name</label>
                        <div>
                            <div class="w-full">
                                <x-input wire:model.defer="institute_name" placeholder="Name of institute" />
                            </div>

                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Institute acronym</label>
                        <div>
                            <x-input wire:model.defer="institute_acronym" placeholder="Acronym of institute" />
                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Institute logo</label>
                        <div>
                            <x-label>
                                <div>
                                    @if ($logo)
                                        Photo Preview:
                                        <img src="{{ $logo->temporaryUrl() }}">
                                    @endif

                                    <div class="w-full mb-2">
                                        <input type="file" class="text-text" wire:model="logo">
                                    </div>

                                    @error('logo')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </x-label>
                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">School address</label>
                        <div>
                            <x-input wire:model.defer="address" placeholder="Address of school" />
                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Academic Year</label>
                        <div>
                            <x-select wire:model.defer="academic_year" placeholder="Select academic year">
                                @foreach ($academic_years as $academic_year)
                                    <x-select.option value="{{ $academic_year->id }}"
                                        label="{{ date('Y', strtotime($academic_year->start_date)) }} - {{ date('Y', strtotime($academic_year->end_date)) }}" />
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
