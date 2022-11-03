<div>
    <x-card title="Admit Student">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-12 gap-4">
                <!-- Admission Form -->
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Admission Form" />

                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12">
                            <div class="w-6/12">
                                <x-select label="Program" wire:model="program"
                                    placeholder="Choose the program that the student intends to get.">
                                    {{-- {{ $programs }} --}}
                                    @foreach ($programs as $program_option)
                                        <x-select.option label="{{ $program_option->name }}"
                                            value="{{ $program_option->id }}" />
                                    @endforeach
                                </x-select>
                            </div>
                        </div>

                        @if (!empty($program))
                            <div class="col-span-12">
                                <x-checkbox label="Transferee" wire:model="isTransferee" value="true" />
                            </div>

                            <span class="hidden"></span>
                            <div class="col-span-12 md:col-span-6  {{ $isTransferee ? '' : 'hidden' }}">
                                <x-select label="Grade level" wire:model="grade_level" placeholder="Choose grade level">
                                    @foreach ($grade_levels as $grade_level_select)
                                        <x-select.option label="{{ $grade_level_select->name }}"
                                            value="{{ $grade_level_select->id }}" />
                                    @endforeach
                                </x-select>
                            </div>

                            @if (empty($isTransferee) || ($isTransferee == true && !empty($grade_level)))
                                <div class="col-span-12 md:col-span-6">
                                    <x-select label="Section" wire:model="section" placeholder="Choose section.">
                                        @foreach ($sections as $section)
                                            <x-select.option label="{{ $section->name }}" value="{{ $section->id }}" />
                                        @endforeach
                                    </x-select>
                                </div>
                            @endif
                        @endif

                        {{-- <div class="col-span-12 lg:col-span-6">
                            <x-input wire:model.defer="address"
                                label="Address (Unit, Street, Barangay, City/Municipality)"
                                placeholder="Your address" />
                        </div> --}}
                    </div>
                </section>

                <!-- Educational Background -->
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Educational Background" />

                    <div class="grid grid-cols-12 gap-4">
                        SKIP MUNA
                        {{-- <div class="col-span-12 md:col-span-6 lg:col-span-3">
                            <x-input wire:model.defer="mobile_number" label="Mobile number"
                                placeholder="Your mobile number" />
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-3">
                            <x-input wire:model.defer="email" label="Email" placeholder="Your email" />
                        </div>

                        <div class="col-span-12 lg:col-span-6">
                            <x-input wire:model.defer="address"
                                label="Address (Unit, Street, Barangay, City/Municipality)"
                                placeholder="Your address" />
                        </div> --}}
                    </div>
                </section>

                <!-- Personal and Physical Information -->
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Personal and Physical Information" />

                    <div class="grid grid-cols-12 gap-2 lg:gap-4">
                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="first_name" label="First name"
                                placeholder="First name of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="middle_name" label="Middle name"
                                placeholder="Middle name of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="last_name" label="Last name"
                                placeholder="Last name of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="suffix" label="Suffix (if applicable)"
                                placeholder="Suffix of student(Jr./III/IV)" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input type="date" wire:model.defer="birth_date" label="Birth date"
                                placeholder="Birth date of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="birthplace" label="Birthplace"
                                placeholder="Birthplace of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="nationality" label="Nationality"
                                placeholder="Nationality of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-select label="Gender" wire:model.defer="gender" placeholder="Select gender of student">
                                <x-select.option label="Male" value="Male" />
                                <x-select.option label="Female" value="Female" />
                            </x-select>
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="religion" label="Religion (if applicable)"
                                placeholder="Religion of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="mother_tongue" label="Mother tongue"
                                placeholder="Mother tongue of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input type="number" wire:model.defer="weight" label="Weight (in cm) (if applicable)"
                                placeholder="Weight of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input type="number" wire:model.defer="height" label="Height (in kg) (if applicable)"
                                placeholder="Height of student" />
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-3">
                            <x-input wire:model.defer="pwd_id" label="PWD ID (if applicable)"
                                placeholder="PWD ID of student" />
                        </div>
                    </div>
                </section>

                <!-- Contact Information -->
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Contact Information" />

                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-6 lg:col-span-3">
                            <x-input wire:model.defer="mobile_number" label="Mobile number"
                                placeholder="Your mobile number" />
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-3">
                            <x-input wire:model.defer="email" label="Email" placeholder="Your email" />
                        </div>

                        <div class="col-span-12 lg:col-span-6">
                            <x-input wire:model.defer="address"
                                label="Address (Unit, Street, Barangay, City/Municipality)"
                                placeholder="Your address" />
                        </div>
                    </div>
                </section>

                <!-- Academic Information -->
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Academic Information" />

                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <x-input wire:model.defer="lrn" label="Learner reference number (LRN) (if applicable)"
                                placeholder="Learner reference number of student" />
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <x-input wire:model.defer="esc" label="Education service contracting (ESC) number"
                                placeholder="Education service contracting number of student" />
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <x-input wire:model.defer="qvr" label="Qualified vouchers recipients (QVR)"
                                placeholder="Qualified vouchers recipients of student" />
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
                            <x-input wire:model.defer="mother_name" label="Full name"
                                placeholder="Full name of student's mother" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="mother_number" label="Contact number"
                                placeholder="Contact number of student's father" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="mother_email" label="Email"
                                placeholder="Email of student's mother" />
                        </div>

                        <div class="col-span-12 lg:col-span-6">
                            <x-input wire:model.defer="mother_address"
                                label="Address (Unit, Street, Barangay, City/Municipality)"
                                placeholder="Address of student's father" />
                        </div>
                    </div>

                    <!-- Father -->
                    <div class="grid grid-cols-12 gap-4 mt-4">
                        <div class="col-span-12">
                            <x-badge blue label="fathers' Information" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="mother_name" label="Full name"
                                placeholder="Full name of student's father" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="mother_number" label="Contact number"
                                placeholder="Contact number of student's father" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="mother_email" label="Email"
                                placeholder="Email of student's father" />
                        </div>

                        <div class="col-span-12 lg:col-span-6">
                            <x-input wire:model.defer="father_address"
                                label="Address (Unit, Street, Barangay, City/Municipality)"
                                placeholder="Address of student's father" />
                        </div>
                    </div>
                </section>

                <!-- Emergency Contact Information -->
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Emergency Contact Information" />

                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="emergency_contact_name" label="Full name"
                                placeholder="Full name of emergency contact person" />
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-input wire:model.defer="emergency_contact_relationship" label="Relationship"
                                placeholder="Relationship of emergency contact person to student" />
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

                <!-- Students Account Information -->
                <section class="container col-span-12">
                    <x-badge class="w-full mb-2" dark md label="Students Account Information" />

                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12">
                            <div class="w-4/12">
                                <x-input wire:model.defer="password" label="Password"
                                    placeholder="Student's password" />
                            </div>
                            <p>*if empty will use default password</p>
                            <p>
                                *default password = "complete first name"."first letter of last name"
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-12 gap-4">

                {{-- <!-- educational background -->
                <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>IV. EDUCATIONAL BACKGROUND</strong></h1>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="school_kinder" label="Kinder" placeholder="School Name" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="school_kindergrad" label="Year Graduated (Kinder)" placeholder="Year" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="elementary_name" label="Elementary" placeholder="School Name" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="elementary_grad_date" label="Year Graduated (Elementary)"
                        placeholder="Year" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="junior_high_name" label="Junior High School"
                        placeholder="School Name" />
                </div> --}}

                <!-- user password -->
                {{-- <div class="sm:col-span-1 md:col-span-12">
                    <h1><strong>PASSWORD</strong></h1>
                </div>
                <div class="sm:col-span-1 md:col-span-4">
                    <x-inputs.password autocomplete="randominput" wire:model.defer="password" label=""
                        placeholder="" />
                </div> --}}

                <x-slot name="footer">
                    <div class="flex justify-between gap-x-4">
                        <x-button flat label="Cancel" wire:click="closeModal" />

                        <x-button wire:click="save" type="button" primary label="Save" />
                    </div>
                </x-slot>
            </div>
        </form>
    </x-card>
</div>
