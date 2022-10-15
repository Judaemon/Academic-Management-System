<div class="container">
    <div class="w-full lg:flex lg:flex-row py-4 gap-4 justify-between">
        <div class="px-4 sm:px-0 lg:w-4/12">
            <h2 class="text-lg font-medium text-gray-900">Institute Infomration</h2>
            <p class="mt-1 text-sm text-gray-600">Lorem ipsum dolor sit, nobis ea?</p>
        </div>

        <ul class="mt-5 lg:flex lg:flex-col lg:w-8/12 p-4 space-y-6 px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md ">
            <li>
                <x-input wire:model.defer="setting.institute_name" label="Institute Name" placeholder="School Name" />
            </li>

            <li>
                <x-input wire:model.defer="setting.institute_acronym" label="Institute acronym" placeholder="CAIMS" />
            </li>

            <li>
                <x-input wire:model.defer="setting.logo" label="School logo" placeholder="School logo path" />
            </li>

            <li>
                <x-input wire:model.defer="setting.address" label="School address" placeholder="School address" />
            </li>

            <li>
                <x-select
                    label="Academic Year"
                    wire:model.defer="setting.academic_year_id"
                    placeholder="Select academic year"
                >
                    @foreach ($academic_years as $academic_year)
                        <x-select.option 
                        value="{{ $academic_year->id }}" 
                        label="{{ date('Y', strtotime($academic_year->start_year)) }} - {{ date('Y', strtotime($academic_year->end_year)) }}" />
                    @endforeach
                </x-select>
            </li>
        </ul>
    </div>

    <div class="hidden sm:block">
        <div class="py-4 lg:py-8">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="w-full lg:flex lg:flex-row py-4 gap-4 justify-between">
        <div class="px-4 sm:px-0 lg:w-4/12">
            <h2 class="text-lg font-medium text-gray-900">Contact Information</h2>
            <p class="mt-1 text-sm text-gray-600">Lorem ipsum dolor sit, nobis ea?</p>
        </div>

        <ul class="mt-5 lg:flex lg:flex-col lg:w-8/12 p-4 space-y-6 px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md ">
            <li>
                <x-input wire:model.defer="setting.email" label="Email" placeholder="caims@gmail.com" />
            </li>

            <li>
                <x-input wire:model.defer="setting.mobile_1" label="Contact number 1" placeholder="Contact number 1" />
            </li>

            <li>
                <x-input wire:model.defer="setting.mobile_2" label="Contact number 2" placeholder="Contact number 2" />
            </li>

            <li>
                <x-input wire:model.defer="setting.telephone_1" label="School telephone" placeholder="School telephone" />
            </li>
        </ul>
    </div>

    <div class="hidden sm:block">
        <div class="py-8">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="lg:grid lg:grid-cols-3 lg:gap-6">
        <div class="px-4 sm:px-0">
            <h2 class="text-lg font-medium text-gray-900">Features </h2>
            <p class="mt-1 text-sm text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, ea?</p>
        </div>

        <div class="mt-5 lg:mt-0 lg:col-span-2">
            <form wire:submit.prevent="">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 md:col-span-4">
                            <div class="">
                                <x-checkbox id="profile_editing" label="Profile Editing" wire:model.defer="setting.profile_editing" />
                            </div>                    
                            
                            <div class="pl-6 mt-3 max-w-xl text-sm text-gray-600">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus possimus sed vero vel pariatur recusandae doloribus, et optio blanditiis autem.
                            </div>
                        </div>
                
                        <div class="col-span-6 md:col-span-4">
                            <div>
                                <x-checkbox id="notify_grades" label="Notify Grades" wire:model.defer="setting.notify_grades" />
                            </div>
            
                            <div class="pl-6 mt-3 max-w-xl text-sm text-gray-600">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus possimus sed vero vel pariatur recusandae doloribus, et optio blanditiis autem.
                            </div>
                        </div>
                
                        <div class="col-span-6 md:col-span-4">
                            <div>
                                <x-checkbox label="Notify Payments" wire:model.defer="setting.notify_payments" />
                            </div>
            
                            <div class="pl-6 mt-3 max-w-xl text-sm text-gray-600">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus possimus sed vero vel pariatur recusandae doloribus, et optio blanditiis autem.
                            </div>
                        </div>

                        <div class="col-span-6 md:col-span-4">
                            <div class="pl-6">
                                <x-input wire:model.defer="setting.notification_type" label="Notification Type" placeholder="School address" />
                            </div>
            
                            <div class="pl-6 mt-3 max-w-xl text-sm text-gray-600">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus possimus sed vero vel pariatur recusandae doloribus, et optio blanditiis autem.
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="hidden sm:block">
        <div class="py-8">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="w-full lg:flex lg:flex-row py-4 gap-4 justify-between">
        <div class="px-4 sm:px-0 lg:w-4/12">
            <h2 class="text-lg font-medium text-gray-900">Social Medias</h2>
            <p class="mt-1 text-sm text-gray-600">Lorem ipsum dolor sit, nobis, ea?</p>
        </div>
        
        <ul class="mt-5 lg:flex lg:flex-col lg:w-8/12 p-4 space-y-6 px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md ">
            <li>
                <x-input wire:model.defer="setting.website_link" label="Website" placeholder="website.com" />
            </li>

            <li>
                <x-input wire:model.defer="setting.facebook_link" label="Facebook" placeholder="facebook.com" />
            </li>

            <li>
                <x-input wire:model.defer="setting.instagram_link" label="Instagram" placeholder="instagram.com" />
            </li>

            <li>
                <x-input wire:model.defer="setting.twitter_link" label="Twitter" placeholder="twitter.com" />
            </li>
        </ul>
    </div>

    <div class="col-span-12 flex justify-end">
        <x-button wire:click="save" type="button" icon="shield-check" negative label="Save" />
    </div>
</div>
