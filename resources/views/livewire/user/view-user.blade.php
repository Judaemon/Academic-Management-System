<div wire:ignore.self class="form-container">
    <x-card title="{{ $cardTitle }}">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
        <div class="col-span-12">
                <!-- personal information -->
                    <h1><strong>I. PERSONAL INFORMATION</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->firstname }}" label="First Name" placeholder="Juan" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->lastname }}" label="Last Name" placeholder="Dela Cruz" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->middlename }}" label="Middle Name" placeholder="Cardo" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->suffix }}" label="Suffix" placeholder="Mr." />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->birthdate }}" label="Birth Date" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->birthplace }}" label="Birth Place" placeholder="Baguio" />
                </div>

                <!-- drop down sana ng mga religions -->
                <div class="col-span-4">
                    <x-input readonly value="{{ $user->religion }}" label="Religion" placeholder="Catholic" />
                </div>

                <!-- drop down din sana pero di ko pa gets -->
                <div class="col-span-4">
                    <x-input readonly value="{{ $user->gender }}" label="Gender" placeholder="Male/Female" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->mothertongue }}" label="Mother Tongue" placeholder="English" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->nationality }}" label="Nationality" placeholder="Filipino" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->pwdid }}" label="PWD ID" placeholder="XXXX0000" />
                </div>

                <!-- physical information -->
                <div class="col-span-12"> 
                    <h1><strong>II. PHYSICAL INFORMATION</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->height }}" label="Height (in cm)" placeholder="165 cm" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->weight }}" label="Weight (in kg)" placeholder="70 kg" />
                </div>

                <!-- contact information -->
                <div class="col-span-12"> 
                    <h1><strong>III. CONTACT INFORMATION</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->mobilenumber }}" label="Contact Number" placeholder="09*********" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->address }}" label="Address" placeholder="Unit, Street, Barangay, City/Municipality" />
                </div>

                {{-- https://stackoverflow.com/questions/2530/how-do-you-disable-browser-autocomplete-on-web-form-field-input-tags --}}
                <div class="col-span-4">
                    <x-input autocomplete="randomshitparadimagautocomplete" readonly value="{{ $user->email }}" label="Email" placeholder="sample@email.com" />
                </div>

                <!-- educational background -->
                <div class="col-span-12"> 
                    <h1><strong>IV. EDUCATIONAL BACKGROUND</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->school_kinder }}" label="Kinder" placeholder="School Name" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->school_kindergrad }}" label="Year Graduated (Kinder)" placeholder="Year" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->school_elementary }}" label="Elementary" placeholder="School Name" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->school_elementarygrad }}" label="Year Graduated (Elementary)" placeholder="Year" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->school_juniorhigh }}" label="Junior High School" placeholder="School Name" />
                </div>

                <!-- academic information -->
                <div class="col-span-12"> 
                    <h1><strong>V. ACADEMIC INFORMATION</strong></h1>
                </div>

                <div class="col-span-6">
                    <x-input readonly value="{{ $user->lrn }}" label="Learner's Reference Number" placeholder="" />
                </div>

                <div class="col-span-6">
                    <x-input readonly value="{{ $user->esc }}" label="Education Service Contracting (ESC) No." placeholder="" />
                </div>

                <div class="col-span-6">
                    <x-input readonly value="{{ $user->qvr }}" label="Qualified Vouchers Recipients (QVR)" placeholder="" />
                </div>

                <div class="col-span-6">
                    <x-input readonly value="{{ $user->public_id }}" label="Public" placeholder="" />
                </div>

                <!-- government beneficiary -->
                <div class="col-span-12"> 
                    <h1><strong>VI. GOVERNMENT BENEFICIARY</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->beneficiary }}" label="Beneficiary" placeholder="" />
                </div>

                <!-- guardian information -->
                <div class="col-span-12"> 
                    <h1><strong>VII. GUARDIAN INFORMATION</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->guardian_name }}" label="Guardian Full Name" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->guardian_number }}" label="Contact Number" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->guardian_occupation }}" label="Occupation" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->guardian_address }}" label="Address" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->guardian_relationship }}" label="Relationship" placeholder="" />
                </div>

                <!-- parents information -->
                <div class="col-span-12"> 
                    <h1><strong>VIII. PARENTS INFORMATION</strong></h1>
                </div>

                <div class="col-span-12"> 
                    <x-card>Mother's Information:</x-card>
                </div>
                
                <div class="col-span-4">
                    <x-input readonly value="{{ $user->mparent_name }}" label="Full Name" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->mparent_number }}" label="Contact Number" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->mparent_occupation }}" label="Occupation" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->mparent_address }}" label="Address" placeholder="" />
                </div>

                <div class="col-span-12"> 
                    <x-card>Father's Information:</x-card>
                </div>
                <div class="col-span-4">
                    <x-input readonly value="{{ $user->fparent_name }}" label="Full Name" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->fparent_number }}" label="Contact Number" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->fparent_occupation }}" label="Occupation" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input readonly value="{{ $user->fparent_address }}" label="Address" placeholder="" />
                </div>

                <!-- user password -->
                <div class="col-span-12"> 
                    <h1><strong>PASSWORD</strong></h1>
                </div>

                <div class="col-span-4">
                    <x-inputs.password autocomplete="randomshitparadimagautocomplete" readonly value="{{ $user->password }}" label="Password" placeholder="" />
                </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button primary icon="x" label="Close" wire:click="closeModal" />
            
            </div>
        </x-slot>
    </x-card>
</div>
