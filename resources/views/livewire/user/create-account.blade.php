<div wire:ignore.self>
    <x-card title="Create Account">
        <form wire:submit.prevent="save">
            <div class="grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- personal information -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>I. PERSONAL INFORMATION</strong></h1>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="first_name" label="First Name" placeholder="Juan" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="last_name" label="Last Name" placeholder="Dela Cruz" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="middle_name" label="Middle Name" placeholder="Cardo" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="suffix" label="Suffix" placeholder="Jr./III/IV" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input type="date" wire:model.defer="birth_date" label="Birth Date" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="birthplace" label="Birth Place" placeholder="City/Municipality" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="religion" label="Religion" placeholder="Catholic" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-select label="Gender" wire:model.defer="gender" placeholder="Select Gender">
                        <x-select.option label="Male" value="Male" />
                        <x-select.option label="Female" value="Female" />
                    </x-select>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="mother_tongue" label="Mother Tongue" placeholder="English" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="nationality" label="Nationality" placeholder="Filipino" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="pwd_id" label="PWD ID" placeholder="XXXX0000" />
                </div>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- physical information -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>II. PHYSICAL INFORMATION</strong></h1>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input type="number" wire:model.defer="height" label="Height (in cm)" placeholder="165 cm" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input type="number" wire:model.defer="weight" label="Weight (in kg)" placeholder="70 kg" />
                </div>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- contact information -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>III. CONTACT INFORMATION</strong></h1>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="mobile_number" label="Contact Number" placeholder="09** *** ****" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="address" label="Address"
                        placeholder="Unit, Street, Barangay, City/Municipality" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input autocomplete="randominput" wire:model.defer="email" label="Email"
                        placeholder="user@email.com" />
                </div>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- government beneficiary -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>IV. GOVERNMENT BENEFICIARY</strong></h1>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="beneficiary" label="Beneficiary" placeholder="" />
                </div>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- emergency contact information -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>V. EMERGENCY CONTACT PERSON</strong></h1>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="emergency_contact_name" label="Full Name" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="emergency_contact_number" label="Contact Number" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="emergency_contact_occupation" label="Occupation" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="emergency_contact_address" label="Address" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="emergency_contact_relationship" label="Relationship" placeholder="" />
                </div>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- government id -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>VI. GOVERNMENT ID NO.</strong></h1>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="pag_ibig" label="Pag-IBIG" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="philhealth" label="PhilHealth" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="sss" label="SSS" placeholder="" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="tin" label="TIN" placeholder="" />
                </div>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- user password -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>PASSWORD</strong></h1>
                </div>
                <div class="sm:col-span-1 md:col-span-4">
                    <x-inputs.password autocomplete="randominput" wire:model.defer="password" label=""
                        placeholder="" />
                </div>
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
