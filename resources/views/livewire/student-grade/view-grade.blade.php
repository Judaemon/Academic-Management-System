<div class="container">
    <x-card title="View Grades">
        <form wire:submit.prevent="save">
            <div class="form-container grid grid-cols-12 gap-4">

                <div class="container col-span-12 md:col-span-4">
                    <x-badge class="w-full mb-2" dark md label="Subjects" />

                    <div class="gap-2 lg:gap-4">
                        {{-- pa-check nalang or paayos ty --}}
                        @foreach ($grades as $grade)
                        <div class="col-span-4 md:col-span-4 lg:col-span-3 px-1 py-1">
                            <x-input readonly value="{{ $grade->name }}" label="Name"
                                placeholder="" />
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="container col-span-12 md:col-span-8">
                    <x-badge class="w-full mb-2" dark md label="Grades" />
                    @foreach ($subjects as $subject)
                        <div class="grid grid-cols-12 gap-8 lg:gap-4">
                            <div class="col-span-2 md:col-span-8 lg:col-span-3 px-1 py-1">
                                <x-input readonly value="{{$subject->grades->first_quarter}}" label="First Quarter"
                                    placeholder="" />
                            </div>

                            <div class="col-span-2 md:col-span-8 lg:col-span-3 px-1 py-1">
                                <x-input readonly value="{{$subject->grades->second_quarter }}" label="Second Quarter"
                                    placeholder="" />
                            </div>

                            <div class="col-span-2 md:col-span-8 lg:col-span-3 px-1 py-1">
                                <x-input readonly value="{{$subject->grades->second_quarter }}" label="Third Quarter"
                                    placeholder="" />
                            </div>

                            <div class="col-span-2 md:col-span-8 lg:col-span-3 px-1 py-1">
                                <x-input readonly value="{{$subject->grades->fourth_quarter }}" label="Fourth Quarter"
                                    placeholder="" />
                            </div>
                        </div>
                    @endforeach
                </div>
            
            </div>

            <x-slot name="footer">
                <div class="flex justify-between gap-x-4">
                    <span></span>
                    <x-button wire:click="closeModal" type="button" primary label="Close" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>