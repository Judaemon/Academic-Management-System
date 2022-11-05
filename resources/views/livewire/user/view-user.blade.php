<div wire:ignore.self class="form-container">
    <x-card title="View User">
        <form wire:submit.prevent="save">
            <div class="sm:grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- personal information -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>I. PERSONAL INFORMATION</strong></h1>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->first_name }}" label="First Name" placeholder="Juan" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->last_name }}" label="Last Name" placeholder="Dela Cruz" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->middle_name }}" label="Middle Name" placeholder="Cardo" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->suffix }}" label="Suffix" placeholder="Mr." />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->birth_date }}" label="Birth Date" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->birthplace }}" label="Birth Place" placeholder="Baguio" />
                </div>

                <!-- drop down sana ng mga religions -->
                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->religion }}" label="Religion" placeholder="Catholic" />
                </div>

                <!-- drop down din sana pero di ko pa gets -->
                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->gender }}" label="Gender" placeholder="Male/Female" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->mother_tongue }}" label="Mother Tongue" placeholder="English" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->nationality }}" label="Nationality" placeholder="Filipino" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->pwd_id }}" label="PWD ID" placeholder="XXXX0000" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- physical information -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>II. PHYSICAL INFORMATION</strong></h1>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->height }}" label="Height (in cm)" placeholder="165 cm" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->weight }}" label="Weight (in kg)" placeholder="70 kg" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- contact information -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>III. CONTACT INFORMATION</strong></h1>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->mobile_number }}" label="Contact Number"
                        placeholder="09*********" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->address }}" label="Address"
                        placeholder="Unit, Street, Barangay, City/Municipality" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input autocomplete="randominput" readonly value="{{ $user->email }}" label="Email"
                        placeholder="sample@email.com" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- educational background -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>IV. EDUCATIONAL BACKGROUND</strong></h1>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->school_kinder }}" label="Kinder" placeholder="School Name" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->school_kindergrad }}" label="Year Graduated (Kinder)"
                        placeholder="Year" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->elementary_name }}" label="Elementary"
                        placeholder="School Name" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->elementary_grad_date }}" label="Year Graduated (Elementary)"
                        placeholder="Year" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->school_juniorhigh }}" label="Junior High School"
                        placeholder="School Name" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- academic information -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>V. ACADEMIC INFORMATION</strong></h1>
                </div>

                <div class="col-span-6">
                    <x-input readonly value="{{ $user->lrn }}" label="Learner's Reference Number" placeholder="" />
                </div>

                <div class="col-span-6">
                    <x-input readonly value="{{ $user->esc }}" label="Education Service Contracting (ESC) No."
                        placeholder="" />
                </div>

                <div class="col-span-6">
                    <x-input readonly value="{{ $user->qvr }}" label="Qualified Vouchers Recipients (QVR)"
                        placeholder="" />
                </div>

                <div class="col-span-6">
                    <x-input readonly value="{{ $user->public_id }}" label="Public" placeholder="" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- government beneficiary -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>VI. GOVERNMENT BENEFICIARY</strong></h1>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->beneficiary }}" label="Beneficiary" placeholder="" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- emergency contact information -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>VII. EMERGENCY CONTACT PERSON</strong></h1>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->emergency_contact_name }}" label="Full Name"
                        placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->emergency_contact_number }}" label="Contact Number"
                        placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->emergency_contact_occupation }}" label="Occupation"
                        placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->emergency_contact_address }}" label="Address"
                        placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->emergency_contact_relationship }}" label="Relationship"
                        placeholder="" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- parents information -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>VIII. PARENTS INFORMATION</strong></h1>
                </div>

                <div class="sm:col-span-1 md:col-span-12">
                    <x-card>Mother's Information:</x-card>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->mparent_name }}" label="Full Name" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->mparent_number }}" label="Contact Number" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->mparent_occupation }}" label="Occupation" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->mparent_address }}" label="Address" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-12">
                    <x-card>Father's Information:</x-card>
                </div>
                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->fparent_name }}" label="Full Name" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->fparent_number }}" label="Contact Number" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->fparent_occupation }}" label="Occupation" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->fparent_address }}" label="Address" placeholder="" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- government id -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>IX. GOVERNMENT ID NO.</strong></h1>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->pag_ibig }}" label="Pag-IBIG" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->philhealth }}" label="PhilHealth" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->sss }}" label="SSS" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $user->tin }}" label="TIN" placeholder="" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- user password -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>PASSWORD</strong></h1>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-inputs.password autocomplete="randominput" readonly value="{{ $user->password }}"
                        label="Password" placeholder="" />
                </div>
            </div>

                <x-slot name="footer">
                    <div class="flex justify-end gap-x-4">
                        <x-button primary icon="x" label="Close" wire:click="closeModal" />

                    </div>
                </x-slot>

            </div>
        </form>
    </x-card>
</div>
