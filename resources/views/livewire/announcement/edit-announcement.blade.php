<div wire:ignore.self>
    <x-card title="Create Announcement">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-4 p-4">
                <div class="col-span-4">
                    <x-input label="Title" corner-hint="" wire:model.defer="title" />
                </div>

                <div class="col-span-4">
                    <x-textarea 
                        wire:model.defer="description" 
                        label="Content" 
                        placeholder="Announcement Description" 
                    />
                </div>

                <div class="col-span-4 flex flex-row space-x-6 mb-1">
                    <div class="w-1/2">
                        <x-datetime-picker
                            without-time
                            wire:model="start_date" 
                            label="Start Date" 
                        />
                    </div>
      
                    <div class="flex justify-center items-center pt-5 uppercase text-sm">
                        TO
                    </div>

                    <div class="w-1/2">
                        <x-datetime-picker 
                            without-time
                            wire:model="end_date" 
                            label="End Date" 
                        />
                    </div>
                </div>

                <div class="col-span-4">
                    <x-select
                        wire:ignore 
                        label="Category"  
                        placeholder="Select Category"
                        :options="['Emergency', 'Holiday', 'Events']"
                        wire:model.defer="category" 
                    />
                </div>

                <div class="col-span-4">
                    <x-input 
                        label="Image"
                        wire:model.defer="main_image"
                        type="file"
                    />
                </div>

                @if($main_image)
                    <div class="col-span-4">
                        <div class="w-full text-sm mb-2">Photo Preview</div>
                        @if($main_image === $announcement->main_image)
                            <div class="w-full h-60 flex items-center justify-center">
                                <img 
                                    src="{{ asset('storage/'.$announcement->main_image) }}" 
                                    class="h-full w-full object-none rounded-lg"
                                />
                            </div>
                            <x-button flat label="Remove Image" wire:click="removeImage" />
                        @else
                            <div class="w-full h-60 flex items-center justify-center">
                                <img 
                                    src="{{ $main_image->temporaryUrl() }}" 
                                    class="h-full w-full object-none rounded-lg"
                                />
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" wire:click="closeModal" />
                    <x-button wire:click.prevent="save" type="submit" primary label="Save" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>
