<div class="container">
    <x-card title="Create Account">
        <form wire:submit.prevent="save">
            <div class="form-container grid grid-cols-12 gap-4">
                {{-- Personal Information --}}
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Personal Information" />

                    <div class="grid grid-cols-12 gap-2 lg:gap-4">
                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="first_name" label="First name"
                                placeholder="First name of employee" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="middle_name" label="Middle name"
                                placeholder="Middle name of employee" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="last_name" label="Last name"
                                placeholder="Last name of employee" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="suffix" label="Suffix (if applicable)"
                                placeholder="Suffix of employee (Jr./III/IV)" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input type="date" wire:model.defer="birth_date" label="Birth date"
                                placeholder="Birth date of employee" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="birth_place" label="Birth place"
                                placeholder="Birth place of employee" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="nationality" label="Nationality"
                                placeholder="Nationality of employee" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-select label="Gender" wire:model.defer="gender" placeholder="Select gender of employee">
                                <x-select.option label="Male" value="Male" />
                                <x-select.option label="Female" value="Female" />
                            </x-select>
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="religion" label="Religion (if applicable)"
                                placeholder="Religion of employee" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="mother_tongue" label="Mother tongue"
                                placeholder="Mother tongue of employee" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="pwd_id" label="PWD ID (if applicable)"
                                placeholder="PWD ID of employee" />
                        </div>
                    </div>
                </section>

                {{-- Contact Information --}}
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Contact Information" />

                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-6 lg:col-span-3">
                            <x-input wire:model.defer="mobile_number" label="Mobile number"
                                placeholder="Mobile number of employee" />
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-3">
                            <x-input wire:model.defer="email" label="Email" placeholder="Email of employee" />
                        </div>

                        <div class="col-span-12 lg:col-span-6">
                            <x-input wire:model.defer="address"
                                label="Address (Unit, Street, Barangay, City/Municipality)"
                                placeholder="Address of employee" />
                        </div>
                    </div>
                </section>

                {{-- Emergency Contact Person --}}
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Emergency Contact Information" />

                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="emergency_contact_name" label="Full name"
                                placeholder="Full name of emergency contact person" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="emergency_contact_relationship" label="Relationship"
                                placeholder="Relationship of emergency contact person to employee" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="emergency_contact_number" label="Contact number"
                                placeholder="Contact number of emergency contact person" />
                        </div>

                        <div class="col-span-12 lg:col-span-6">
                            <x-input wire:model.defer="emergency_contact_address"
                                label="Address (Unit, Street, Barangay, City/Municipality)"
                                placeholder="Address of emergency contact person" />
                        </div>
                    </div>
                </section>

                {{-- Government IDs --}}
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Government IDs" />

                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <x-input wire:model.defer="pag_ibig" label="Pag-IBIG" placeholder="Pag-IBIG ID number" />
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <x-input wire:model.defer="philhealth" label="PhilHealth"
                                placeholder="PhilHealth ID number" />
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <x-input wire:model.defer="sss" label="SSS" placeholder="SSS ID number" />
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <x-input wire:model.defer="tin" label="TIN" placeholder="TIN ID number" />
                        </div>

                    </div>
                </section>

                {{-- Account Information --}}
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Employee Account Information" />

                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-8">
                            <x-input wire:model.defer="password" label="Password"
                                placeholder="employee's password" />
                            <p>*if empty will use default password</p>
                            <p>
                                *default password = "complete first name"."first letter of last name"
                            </p>
                        </div>

                        <div class="col-span-12 md:col-span-4">
                            <x-select label="Employee role" wire:model.defer="employee_role"
                                placeholder="employees' role" :async-data="route('roles.roles')" option-label="name"
                                option-value="id" />
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
