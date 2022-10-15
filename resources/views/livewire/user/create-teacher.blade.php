<div wire:ignore.self>
    <x-card title="Create User">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
            <!-- personal information -->
                <div class="col-span-12"> 
                    <h1><strong>I. PERSONAL INFORMATION</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.firstname" label="First Name" placeholder="Juan" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.lastname" label="Last Name" placeholder="Dela Cruz" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.middlename" label="Middle Name" placeholder="Cardo" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.suffix" label="Suffix" placeholder="Jr./III/IV" />
                </div>

                <div class="col-span-4">
                    <x-input type="date" wire:model.defer="user.birthdate" label="Birth Date" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.birthplace" label="Birth Place" placeholder="City/Municipality" />
                </div>

                <!-- drop down sana ng mga religions -->
                <div class="col-span-4">
                    <x-input wire:model.defer="user.religion" label="Religion" placeholder="Catholic" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-select
                        label="Gender"
                        wire:model.defer="gender"
                        placeholder="Select Gender"
                    >
                            <x-select.option label="{{ $genderm }}" value="{{ $genderm }}" />
                            <x-select.option label="{{ $genderf }}" value="{{ $genderf }}" />
                            <x-select.option label="{{ $gendero }}" value="{{ $gendero }}" />
                    </x-select>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.mothertongue" label="Mother Tongue" placeholder="English" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.nationality" label="Nationality" placeholder="Filipino" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.pwdid" label="PWD ID" placeholder="XXXX0000" />
                </div>

                <!-- physical information -->
                <div class="col-span-12"> 
                    <h1><strong>II. PHYSICAL INFORMATION</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input type="number" wire:model.defer="user.height" label="Height (in cm)" placeholder="165 cm" />
                </div>

                <div class="col-span-4">
                    <x-input type="number" wire:model.defer="user.weight" label="Weight (in kg)" placeholder="70 kg" />
                </div>

                <!-- contact information -->
                <div class="col-span-12"> 
                    <h1><strong>III. CONTACT INFORMATION</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.mobilenumber" label="Contact Number" placeholder="09*********" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.address" label="Address" placeholder="Unit, Street, Barangay, City/Municipality" />
                </div>

                {{-- https://stackoverflow.com/questions/2530/how-do-you-disable-browser-autocomplete-on-web-form-field-input-tags --}}
                <div class="col-span-4">
                    <x-input autocomplete="randomshitparadimagautocomplete" wire:model.defer="user.email" label="Email" placeholder="sample@email.com" />
                </div>

                <!-- user password -->
                <div class="col-span-12"> 
                    <h1><strong>PASSWORD</strong></h1>
                </div>
                <div class="col-span-4">
                    <x-inputs.password  autocomplete="randomshitparadimagautocomplete" wire:model.defer="user.password" label="" placeholder="" />
                </div>
                {{-- read link security reason ignore nalang muna --}}
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat label="Cancel" wire:click="closeModal" />
                
                <x-button wire:click="save" type="button" primary label="Save" />
            </div>
        </x-slot>
    </x-card>
</div>
