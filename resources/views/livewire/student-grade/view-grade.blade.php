<div class="container">
    <x-card title="View Grades">
        <form wire:submit.prevent="save">
            <div class="form-container grid grid-cols-12 gap-4">

                <div class="container col-span-12 md:col-span-4">
                    <x-badge class="w-full mb-2" dark md label="Subjects" />

                    <div class="gap-2 lg:gap-4">
                        {{-- pa-check nalang or paayos ty --}}
                        @foreach ($grades as $grade)
                        <div class="col-span-4 md:col-span-4 lg:col-span-3 px-2 py-2">
                            <x-input readonly value="{{ $grade->name }}"/>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="container col-span-12 md:col-span-8">
                    <x-badge class="w-full mb-2" dark md label="Quarters" />
                    @foreach ($subjects as $subject)
                        <div class="grid grid-cols-12 gap-8 lg:gap-4">
                            <div class="col-span-2 md:col-span-8 lg:col-span-3 py-2 px-2">
                                <x-input readonly value="{{$subject->grades->first_quarter}}"/>
                            </div>

                            <div class="col-span-2 md:col-span-3 lg:col-span-2 px-2 py-2">
                                <x-input readonly value="{{$subject->grades->second_quarter }}"/>
                            </div>

                            <div class="col-span-2 md:col-span-3 lg:col-span-2 px-2 py-2">
                                <x-input readonly value="{{$subject->grades->second_quarter }}"/>
                            </div>

                            <div class="col-span-2 md:col-span-3 lg:col-span-2 px-2 py-2">
                                <x-input readonly value="{{$subject->grades->fourth_quarter }}"/>
                            </div>
                        </div>
                    @endforeach
                </div>
            
            </div>

            <x-slot name="footer">
                <div class="flex justify-between gap-x-4">
                    <x-button info icon="arrow-down" label="Download" wire:click="downloadGrade" />
                    <x-button negative icon="x-circle" label="Close" wire:click="closeModal" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>