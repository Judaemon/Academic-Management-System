<div class="container">
    <x-card title="View Grades">
        <form wire:submit.prevent="save">
            <div class="form-container grid grid-cols-12 gap-4">

                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Subjects" />

                    <div class="grid grid-cols-12 gap-2 lg:gap-4">
                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            {{-- <x-input readonly value="{{ $grade->subject->name }}" label="Subject"
                                placeholder="" /> --}}
                        </div>
                    </div>
                </section>

                
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Grades" />
                    @foreach ($subjects as $subject)
                        <div class="grid grid-cols-12 gap-2 lg:gap-4">
                            <div class="col-span-12 md:col-span-4 lg:col-span-3">
                                <x-input readonly value="{{$subject->grades->first_quarter}}" label="First Quarter"
                                    placeholder="" />
                            </div>

                            <div class="col-span-12 md:col-span-4 lg:col-span-3">
                                <x-input readonly value="{{$subject->grades->second_quarter }}" label="Second Quarter"
                                    placeholder="" />
                            </div>

                            <div class="col-span-12 md:col-span-4 lg:col-span-3">
                                <x-input readonly value="{{$subject->grades->second_quarter }}" label="Third Quarter"
                                    placeholder="" />
                            </div>

                            <div class="col-span-12 md:col-span-4 lg:col-span-3">
                                <x-input readonly value="{{$subject->grades->fourth_quarter }}" label="Fourth Quarter"
                                    placeholder="" />
                            </div>
                        </div>
                    @endforeach
                </section>
            
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