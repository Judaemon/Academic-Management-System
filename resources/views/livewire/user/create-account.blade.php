<div wire:ignore.self>
    <x-card title="Create Account">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
            <!-- personal information -->
                <div class="col-span-12"> 
                    <h1><strong>I. PERSONAL INFORMATION</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="firstname" label="First Name (*)" placeholder="Juan" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="lastname" label="Last Name (*)" placeholder="Dela Cruz" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="middlename" label="Middle Name" placeholder="Cardo" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="suffix" label="Suffix" placeholder="Jr./III/IV" />
                </div>

                <div class="col-span-4">
                    <x-input type="date" wire:model.defer="birthdate" label="Birth Date (*)" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="birthplace" label="Birth Place (*)" placeholder="City/Municipality" />
                </div>

                <!-- drop down sana ng mga religions -->
                <div class="col-span-4">
                    <x-input wire:model.defer="religion" label="Religion (*)" placeholder="Catholic" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-select
                        label="Gender (*)"
                        wire:model.defer="gender"
                        placeholder="Select Gender"
                    >
                            <x-select.option label="Male" value="Male" />
                            <x-select.option label="Female" value="Female" />
                    </x-select>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="mothertongue" label="Mother Tongue (*)" placeholder="English" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="nationality" label="Nationality (*)" placeholder="Filipino" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="pwdid" label="PWD ID" placeholder="XXXX0000" />
                </div>

                <!-- physical information -->
                <div class="col-span-12"> 
                    <h1><strong>II. PHYSICAL INFORMATION</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input type="number" wire:model.defer="height" label="Height (in cm)" placeholder="165 cm" />
                </div>

                <div class="col-span-4">
                    <x-input type="number" wire:model.defer="weight" label="Weight (in kg)" placeholder="70 kg" />
                </div>

                <!-- contact information -->
                <div class="col-span-12"> 
                    <h1><strong>III. CONTACT INFORMATION</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="mobilenumber" label="Contact Number (*)" placeholder="09** *** ****" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="address" label="Address (*)" placeholder="Unit, Street, Barangay, City/Municipality" />
                </div>

                {{-- https://stackoverflow.com/questions/2530/how-do-you-disable-browser-autocomplete-on-web-form-field-input-tags --}}
                <div class="col-span-4">
                    <x-input autocomplete="randomshitparadimagautocomplete" wire:model.defer="email" label="Email (*)" placeholder="user@email.com" />
                </div>

                <!-- government beneficiary -->
                <div class="col-span-12"> 
                    <h1><strong>IV. GOVERNMENT BENEFICIARY</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="beneficiary" label="Beneficiary" placeholder="" />
                </div>

                <!-- government id -->
                <div class="col-span-12"> 
                    <h1><strong>V. GOVERNMENT ID NO.</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="pag_ibig" label="Pag-IBIG" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="philhealth" label="PhilHealth" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="sss" label="SSS" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="tin" label="TIN" placeholder="" />
                </div>

                <!-- user password -->
                <div class="col-span-12"> 
                    <h1><strong>PASSWORD</strong></h1>
                </div>
                <div class="col-span-4">
                    <x-inputs.password  autocomplete="randomshitparadimagautocomplete" wire:model.defer="password" label="" placeholder="" />
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
