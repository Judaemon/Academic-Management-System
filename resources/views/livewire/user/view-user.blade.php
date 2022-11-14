<div class="container">
    <x-card title="View User">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-12 gap-4">
                <!-- Personal and Physical Information -->
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Personal and Physical Information" />

                    <div class="grid grid-cols-12 gap-2 lg:gap-4">
                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="user.first_name" label="First name" readonly
                                placeholder="First name of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="user.middle_name" label="Middle name" readonly
                                placeholder="Middle name of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="user.last_name" label="Last name" readonly
                                placeholder="Last name of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="user.suffix" label="Suffix (if applicable)" readonly
                                placeholder="Suffix of student(Jr./III/IV)" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input type="date" wire:model.defer="user.birth_date" label="Birth date" readonly
                                placeholder="Birth date of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="user.birth_place" label="Birth place" readonly
                                placeholder="Birth place of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="user.nationality" label="Nationality" readonly
                                placeholder="Nationality of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-select label="Gender" wire:model.defer="user.gender" readonly
                                placeholder="Select gender of student">
                                <x-select.option label="Male" value="Male" />
                                <x-select.option label="Female" value="Female" />
                            </x-select>
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="user.religion" label="Religion (if applicable)" readonly
                                placeholder="Religion of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="user.mother_tongue" label="Mother tongue" readonly
                                placeholder="Mother tongue of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input type="number" wire:model.defer="user.weight"
                                label="Weight (in cm) (if applicable)" readonly placeholder="Weight of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input type="number" wire:model.defer="user.height"
                                label="Height (in kg) (if applicable)" readonly placeholder="Height of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="user.pwd_id" label="PWD ID (if applicable)" readonly
                                placeholder="PWD ID of student" />
                        </div>
                    </div>
                </section>

                <!-- Educational Background -->
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Educational Background" />

                    {{-- Kindergarten --}}
                    <div class="grid grid-cols-12 gap-2 mb-2">
                        <div class="col-span-12">
                            <x-badge secondary label="Kindergarten" />
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <x-input wire:model.defer="user.kinder_name" label="Name of school" readonly
                                placeholder="The student's kindergarten school's name" />
                        </div>


                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <x-input wire:model.defer="user.kinder_grad_date" label="Year graduated" readonly
                                placeholder="Year the student completed kindergarten" />
                        </div>
                    </div>

                    {{-- Elementary --}}
                    <div class="grid grid-cols-12 gap-2 mb-2">
                        <div class="col-span-12">
                            <x-badge class="" secondary label="Elementary" />
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <x-input wire:model.defer="user.elementary_name" label="Name of school" readonly
                                placeholder="The user's elementary school's name" />
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <x-input wire:model.defer="user.elementary_grad_date" label="Year graduated" readonly
                                placeholder="Year the user completed elementary" />
                        </div>
                    </div>

                    {{-- Junior High --}}
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-12">
                            <x-badge class="flex px-2" secondary label="Junior High" />
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <x-input wire:model.defer="user.junior_high_name" label="Name of school" readonly
                                placeholder="The user's junior high school's name" />
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <x-input wire:model.defer="user.elementary_grad_date" label="Year graduated" readonly
                                placeholder="Year the user completed junior high" />
                        </div>
                    </div>
                </section>

                <!-- Academic Information -->
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Academic Information" />

                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <x-input wire:model.defer="user.lrn"
                                label="Learner reference number (LRN) (if applicable)" readonly
                                placeholder="Learner reference number of user" />
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <x-input wire:model.defer="user.esc" label="Education service contracting (ESC) number"
                                readonly placeholder="Education service contracting number of user" />
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <x-input wire:model.defer="user.qvr" label="Qualified vouchers recipients (QVR)" readonly
                                placeholder="Qualified vouchers recipients of user" />
                        </div>
                    </div>
                </section>

                <!-- Contact Information -->
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Contact Information" />

                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-6 lg:col-span-3">
                            <x-input wire:model.defer="user.mobile_number" label="Mobile number" readonly
                                placeholder="Mobile number of user" />
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-3">
                            <x-input wire:model.defer="user.email" label="Email" readonly
                                placeholder="Email of user" />
                        </div>

                        <div class="col-span-12 lg:col-span-6">
                            <x-input wire:model.defer="user.address"
                                label="Address (Unit, Street, Barangay, City/Municipality)" readonly
                                placeholder="Address of user" />
                        </div>
                    </div>
                </section>

                <!-- Parents Information -->
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Parents Information" />

                    <!-- Mother -->
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12">
                            <x-badge pink label="Mothers' Information" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="user.mother_name" label="Full name" readonly
                                placeholder="Full name of user's mother" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="user.mother_number" label="Contact number" readonly
                                placeholder="Contact number of user's father" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="user.mother_email" label="Email" readonly
                                placeholder="Email of user's mother" />
                        </div>

                        <div class="col-span-12 lg:col-span-6">
                            <x-input wire:model.defer="user.mother_address"
                                label="Address (Unit, Street, Barangay, City/Municipality)" readonly
                                placeholder="Address of user's father" />
                        </div>
                    </div>

                    <!-- Father -->
                    <div class="grid grid-cols-12 gap-4 mt-4">
                        <div class="col-span-12">
                            <x-badge blue label="Fathers' Information" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="user.father_name" label="Full name" readonly
                                placeholder="Full name of user's father" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="user.father_number" label="Contact number" readonly
                                placeholder="Contact number of user's father" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="father_email" label="Email" readonly
                                placeholder="Email of student's father" />
                        </div>

                        <div class="col-span-12 lg:col-span-6">
                            <x-input wire:model.defer="user.father_address"
                                label="Address (Unit, Street, Barangay, City/Municipality)" readonly
                                placeholder="Address of student's father" />
                        </div>
                    </div>
                </section>

                <!-- Emergency Contact Information -->
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Emergency Contact Information" />

                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="user.emergency_contact_name" label="Full name" readonly
                                placeholder="Full name of emergency contact person" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="user.emergency_contact_relationship" label="Relationship"
                                readonly placeholder="Relationship of emergency contact person to student" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="user.emergency_contact_number" label="Contact number" readonly
                                placeholder="Contact number of emergency contact person" />
                        </div>

                        <div class="col-span-12 lg:col-span-6">
                            <x-input wire:model.defer="user.emergency_contact_address"
                                label="Address (Unit, Street, Barangay, City/Municipality)" readonly
                                placeholder="Address of emergency contact person" />
                        </div>
                    </div>
                </section>

                @unlessrole('Student')
                    {{-- Government IDs --}}
                    <section class="container col-span-12">
                        <x-badge class="w-full mb-2" dark md label="Government IDs" />

                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                <x-input wire:model.defer="user.pag_ibig" label="Pag-IBIG" readonly
                                    placeholder="Pag-IBIG ID number" />
                            </div>

                            <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                <x-input wire:model.defer="user.philhealth" label="PhilHealth" readonly
                                    placeholder="PhilHealth ID number" />
                            </div>

                            <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                <x-input wire:model.defer="user.sss" label="SSS" readonly
                                    placeholder="SSS ID number" />
                            </div>

                            <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                <x-input wire:model.defer="user.tin" label="TIN" readonly
                                    placeholder="TIN ID number" />
                            </div>

                        </div>
                    </section>
                @endhasrole

                {{-- Account Information --}}
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Employee Account Information" />

                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-8">
                            <x-input wire:model.defer="user.password" label="Password" readonly
                                placeholder="employee's password" />
                            <p>*if empty will use default password</p>
                            <p>
                                *default password = "complete first name"."first letter of last name"
                            </p>
                        </div>

                        <div class="col-span-12 md:col-span-4">
                            <x-select label="Role" wire:model="user_roles" placeholder="Select role" readonly
                                :async-data="route('roles.roles')" option-label="name" option-value="id" multiselect />
                        </div>
                    </div>
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
