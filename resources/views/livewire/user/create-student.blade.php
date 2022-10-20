<div wire:ignore.self>
    <x-card title="Create Student">
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
                    <x-input wire:model.defer="mobilenumber" label="Contact Number (*)" placeholder="09*********" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="address" label="Address (*)" placeholder="Unit, Street, Barangay, City/Municipality" />
                </div>

                <div class="col-span-4">
                    <x-input autocomplete="randominput" wire:model.defer="email" label="Email (*)" placeholder="sample@email.com" />
                </div>

                <!-- educational background -->
                <div class="col-span-12"> 
                    <h1><strong>IV. EDUCATIONAL BACKGROUND</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="school_kinder" label="Kinder" placeholder="School Name" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="school_kindergrad" label="Year Graduated (Kinder)" placeholder="Year" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="school_elementary" label="Elementary" placeholder="School Name" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="school_elementarygrad" label="Year Graduated (Elementary)" placeholder="Year" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="school_juniorhigh" label="Junior High School" placeholder="School Name" />
                </div>

                <!-- academic information -->
                <div class="col-span-12"> 
                    <h1><strong>V. ACADEMIC INFORMATION</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="lrn" label="Learner's Reference Number" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="esc" label="Education Service Contracting (ESC) No." placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="qvr" label="Qualified Vouchers Recipients (QVR)" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="public_id" label="Public" placeholder="" />
                </div>

                <!-- government beneficiary -->
                <div class="col-span-12"> 
                    <h1><strong>VI. GOVERNMENT BENEFICIARY</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="beneficiary" label="Beneficiary" placeholder="" />
                </div>

                <!-- emergency contact information -->
                <div class="col-span-12"> 
                    <h1><strong>VII. EMERGENCY CONTACT PERSON</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="emergency_contact_name" label="Full Name (*)" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="emergency_contact_number" label="Contact Number (*)" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="emergency_contact_occupation" label="Occupation" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="emergency_contact_address" label="Address (*)" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="emergency_contact_relationship" label="Relationship (*)" placeholder="" />
                </div>

                <!-- parents information -->
                <div class="col-span-12"> 
                    <h1><strong>VIII. PARENTS INFORMATION</strong></h1>
                </div>

                <div class="col-span-12"> 
                    <x-card>Mother's Information:</x-card>
                </div>
                
                <div class="col-span-4">
                    <x-input wire:model.defer="mparent_name" label="Full Name" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="mparent_number" label="Contact Number" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="mparent_occupation" label="Occupation" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="mparent_address" label="Address" placeholder="" />
                </div>

                <div class="col-span-12"> 
                    <x-card>Father's Information:</x-card>
                </div>
                <div class="col-span-4">
                    <x-input wire:model.defer="fparent_name" label="Full Name" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="fparent_number" label="Contact Number" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="fparent_occupation" label="Occupation" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="fparent_address" label="Address" placeholder="" />
                </div>

                <!-- user password -->
                <div class="col-span-12"> 
                    <h1><strong>PASSWORD</strong></h1>
                </div>
                <div class="col-span-4">
                    <x-inputs.password  autocomplete="randominput" wire:model.defer="password" label="" placeholder="" />
                </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat label="Cancel" wire:click="closeModal" />
                
                <x-button wire:click="save" type="button" primary label="Save" />
            </div>
        </x-slot>
    </x-card>
</div>
