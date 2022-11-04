<x-app-layout>
    <!-- Profile Card -->
    <div class="p-4 bg-white rounded-lg shadow-md mb-4">
        <div class="flex flex-col rounded-lg  shadow-xs md:flex-row">
            <div class="md:w-52 flex justify-center">
                <x-avatar size="w-52 h-52" squared
                    src="https://ui-avatars.com/api/?name={{ auth()->user()->first_name }}+{{ auth()->user()->last_name }}&format=svg" />
            </div>

            <div class="flex flex-col space-y-2 mt-4 md:grow md:pl-4 md:m-0 md:justify-between">
                <div>
                    <div class="flex justify-between">
                        <h2 class="font-semibold">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }} </h2>
                        <x-badge dark rounded md label="20192151" />
                    </div>
                    <p class="text-sm">Elementary - Grade level</p>
                </div>

                @hasrole('Student')
                    <div class="space-y-2 md:flex md:justify-end md:space-x-2 md:space-y-0">
                        <div class="w-full lg:w-4/12">
                            <x-button class="w-full" href="https://google.com" label="Grades Record" />
                        </div>

                        <div class="w-full lg:w-4/12">
                            <x-button class="w-full" href="https://google.com" label="Assessment of Fees" />
                        </div>
                    </div>
                @endhasrole
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-4">
        <!-- Personal and Physical Information -->
        <section class="container col-span-12 md:col-span-8 p-4 bg-white rounded-lg shadow-md">
            <x-badge class="w-full mb-2" dark md label="Personal and Physical Information" />

            {{-- <div class="flex flex-col space-y-2 px-2"> --}}
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4 md:col-span-3">
                    <p class="font-semibold text-sm"> {{ auth()->user()->first_name }}</p>
                    <p class="text-xs italic text-gray-600">First name</p>
                </div>

                <div class="col-span-4 md:col-span-3">
                    <p class="font-semibold text-sm"> {{ auth()->user()->middle_name }}</p>
                    <p class="text-xs italic text-gray-600">Middle name</p>
                </div>

                <div class="col-span-4 md:col-span-3">
                    <p class="font-semibold text-sm"> {{ auth()->user()->last_name }}</p>
                    <p class="text-xs italic text-gray-600">Last name</p>
                </div>

                <div class="col-span-4 md:col-span-3">
                    <p class="font-semibold text-sm"> {{ auth()->user()->suffix }}</p>
                    <p class="text-xs italic text-gray-600">Suffix</p>
                </div>

                <div class="col-span-4 md:col-span-3">
                    <p class="font-semibold text-sm">{{ auth()->user()->birth_date }}</p>
                    <p class="text-xs italic text-gray-600">Birth date</p>
                </div>

                <div class="col-span-4 md:col-span-3">
                    <p class="font-semibold text-sm">{{ auth()->user()->birthplace }}</p>
                    <p class="text-xs italic text-gray-600">Birthplace</p>
                </div>

                <div class="col-span-4 md:col-span-3">
                    <p class="font-semibold text-sm">{{ auth()->user()->nationality }}</p>
                    <p class="text-xs italic text-gray-600">Nationality</p>
                </div>

                <div class="col-span-4 md:col-span-3">
                    <p class="font-semibold text-sm">{{ auth()->user()->gender }}</p>
                    <p class="text-xs italic text-gray-600">Gender</p>
                </div>

                <div class="col-span-4 md:col-span-3">
                    <p class="font-semibold text-sm">{{ auth()->user()->religion }}</p>
                    <p class="text-xs italic text-gray-600">Religion</p>
                </div>

                <div class="col-span-4 md:col-span-3">
                    <p class="font-semibold text-sm">{{ auth()->user()->mother_tongue }}</p>
                    <p class="text-xs italic text-gray-600">Mother tongue</p>
                </div>

                <div class="col-span-4 md:col-span-3">
                    <p class="font-semibold text-sm">{{ auth()->user()->weight }}</p>
                    <p class="text-xs italic text-gray-600">Weight</p>
                </div>

                <div class="col-span-4 md:col-span-3">
                    <p class="font-semibold text-sm">{{ auth()->user()->height }}</p>
                    <p class="text-xs italic text-gray-600">Height</p>
                </div>

                <div class="col-span-4 md:col-span-3">
                    <p class="font-semibold text-sm">{{ auth()->user()->pwd_id }}</p>
                    <p class="text-xs italic text-gray-600">PWD ID</p>
                </div>
            </div>
        </section>

        <!-- Contact Information-->
        <section class="container col-span-12 md:col-span-4 p-4 bg-white rounded-lg shadow-md">
            <x-badge class="w-full mb-2" dark md label="Contact Information" />

            <div class="flex flex-col space-y-2">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->mobile_number }}</p>
                        <p class="text-xs italic text-gray-600">Mobile number</p>
                    </div>

                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->email }}</p>
                        <p class="text-xs italic text-gray-600">Email</p>
                    </div>

                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->address }}</p>
                        <p class="text-xs italic text-gray-600">Address</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Educational Background -->
        <section class="container col-span-12 md:col-span-6 p-4 bg-white rounded-lg shadow-md">
            <x-badge class="w-full mb-2" dark md label="Educational Background" />

            <div class="flex flex-col space-y-2">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-6">
                        <p class="font-semibold text-sm"> {{ auth()->user()->elementary_name }}</p>
                        <p class="text-xs italic text-gray-600">Elementary School</p>
                    </div>

                    <div class="col-span-6">
                        <p class="font-semibold text-sm"> {{ auth()->user()->elementary_grad_date }}</p>
                        <p class="text-xs italic text-gray-600">Year Graduated</p>
                    </div>

                    <div class="col-span-6">
                        <p class="font-semibold text-sm"> {{ auth()->user()->junior_high_name }}</p>
                        <p class="text-xs italic text-gray-600">Junior High School</p>
                    </div>

                    <div class="col-span-6">
                        <p class="font-semibold text-sm"> {{ auth()->user()->junior_high_grad_date }}</p>
                        <p class="text-xs italic text-gray-600">Year Graduated</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Academic Information -->
        <section class="container col-span-12 md:col-span-6 p-4 bg-white rounded-lg shadow-md">
            <x-badge class="w-full mb-2" dark md label="Academic Information" />

            <div class="flex flex-col space-y-2">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->lrn }}</p>
                        <p class="text-xs italic text-gray-600">Learner's Reference Number (LRN)</p>
                    </div>

                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->esc }}</p>
                        <p class="text-xs italic text-gray-600">Education Service Contracting (ESC)</p>
                    </div>

                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->qvr }}</p>
                        <p class="text-xs italic text-gray-600">Qualified Voucher Recipient (QVR)</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Parent Information -->
        <section class="container col-span-12 md:col-span-8 p-4 bg-white rounded-lg shadow-md">
            <x-badge class="w-full mb-2" dark md label="Parents Information" />

            <div class="flex flex-row space-y-2">
                <div class="w-1/2 grid grid-cols-12 gap-4">
                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->mother_name }}</p>
                        <p class="text-xs italic text-gray-600">Mothers' Full Name</p>
                    </div>

                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->mother_number }}</p>
                        <p class="text-xs italic text-gray-600">Contact Number</p>
                    </div>

                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->mother_email }}</p>
                        <p class="text-xs italic text-gray-600">Email</p>
                    </div>

                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->mother_address }}</p>
                        <p class="text-xs italic text-gray-600">Address</p>
                    </div>
                </div>

                <div class="w-1/2 grid grid-cols-12 gap-4">
                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->father_name }}</p>
                        <p class="text-xs italic text-gray-600">Fathers' Full Name</p>
                    </div>

                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->father_number }}</p>
                        <p class="text-xs italic text-gray-600">Contact Number</p>
                    </div>

                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->father_email }}</p>
                        <p class="text-xs italic text-gray-600">Email</p>
                    </div>

                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->father_address }}</p>
                        <p class="text-xs italic text-gray-600">Address</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Emergency Contact Information -->
        <section class="container col-span-12 md:col-span-4 p-4 bg-white rounded-lg shadow-md">
            <x-badge class="w-full mb-2" dark md label="Emergency Contact Information" />

            <div class="flex flex-col space-y-2">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->emergency_contact_name }}</p>
                        <p class="text-xs italic text-gray-600">Full Name</p>
                    </div>

                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->emergency_contact_number }}</p>
                        <p class="text-xs italic text-gray-600">Contact Number</p>
                    </div>

                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->emergency_contact_relationship }}</p>
                        <p class="text-xs italic text-gray-600">Relationship</p>
                    </div>

                    <div class="col-span-12">
                        <p class="font-semibold text-sm"> {{ auth()->user()->emergency_contact_address }}</p>
                        <p class="text-xs italic text-gray-600">Address</p>
                    </div>
                </div>
            </div>
        </section>

        @unlessrole('Student')
            <!-- Government IDs -->
            <section class="container col-span-12 md:col-span-6 p-4 bg-white rounded-lg shadow-md">
                <x-badge class="w-full mb-2" dark md label="Government IDs" />

                <div class="flex flex-col space-y-2">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12">
                            <p class="font-semibold text-sm"> {{ auth()->user()->pag_ibig }}</p>
                            <p class="text-xs italic text-gray-600">Pag-IBIG ID</p>
                        </div>

                        <div class="col-span-12">
                            <p class="font-semibold text-sm"> {{ auth()->user()->philhealth }}</p>
                            <p class="text-xs italic text-gray-600">PhilHealth ID</p>
                        </div>

                        <div class="col-span-12">
                            <p class="font-semibold text-sm"> {{ auth()->user()->sss }}</p>
                            <p class="text-xs italic text-gray-600">Social Security System (SSS) ID</p>
                        </div>

                        <div class="col-span-12">
                            <p class="font-semibold text-sm"> {{ auth()->user()->tin }}</p>
                            <p class="text-xs italic text-gray-600">Taxpayer Identification Number (TIN) ID</p>
                        </div>
                    </div>
                </div>
            </section>
        @endunlessrole

        <section class="container col-span-12 md:col-span-6 p-4 bg-white rounded-lg shadow-md">
            <x-button icon="pencil" info label="Edit Contact Information"
                onclick="livewire.emit('openModal', 'profile.update-contact-information')" />

            {{-- To update guardian information, click HERE --}}
            {{-- To update parents information, click HERE --}}
        </section>

    </div>
</x-app-layout>
