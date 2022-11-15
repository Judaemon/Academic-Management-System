<div class="container">
    <x-card title="Assign Grades">
        <form wire:submit.prevent="save">
            <div class="form-container grid grid-cols-12 gap-4">

                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Students" />

                    <div class="grid grid-cols-12 gap-2 lg:gap-4">
                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="student_id" label="Student"
                                placeholder="" />
                        </div>
                    </div>
                </section>

                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Subjects" />

                    <div class="grid grid-cols-12 gap-2 lg:gap-4">
                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="subject_id" label="Subject"
                                placeholder="" />
                        </div>
                    </div>
                </section>

                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Grades" />

                    <div class="grid grid-cols-12 gap-2 lg:gap-4">
                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="first_quarter" label="First Quarter"
                                placeholder="" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="second_quarter" label="Second Quarter"
                                placeholder="" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="third_quarter" label="Third Quarter"
                                placeholder="" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="fourth_quarter" label="Fourth Quarter"
                                placeholder="" />
                        </div>
                    </div>
                </section>
                
            </div>

            <x-slot name="footer">
                <div class="flex justify-between gap-x-4">
                    <x-button flat label="Cancel" wire:click="closeModal" />

                    <x-button wire:click="save" type="button" primary label="Save" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>