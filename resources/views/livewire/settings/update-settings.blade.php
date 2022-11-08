<div class="container">
    {{-- Institute Information --}}
    <div class="w-full lg:flex lg:flex-row py-4 gap-4 justify-between">
        <div class="px-4 sm:px-0 lg:w-4/12">
            <h2 class="text-lg font-medium text-text">Institute Infomration</h2>
            <p class="mt-1 text-sm text-text">Lorem ipsum dolor sit, nobis ea?</p>
        </div>

        <ul
            class="mt-5 lg:flex lg:flex-col lg:w-8/12 p-4 space-y-6 px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md ">
            <li>
                <x-input wire:model.defer="setting.institute_name" label="Institute Name" placeholder="School Name" />
            </li>

            <li>
                <x-input wire:model.defer="setting.institute_acronym" label="Institute acronym" placeholder="CAIMS" />
            </li>

            <li>
                <x-label>
                    School logo
                    <div>
                        <input type="file" wire:model="logo">

                        @error('logo')
                            <span class="error">{{ $message }}</span>
                        @enderror

                        {{-- <button type="submit">Save Photo</button> --}}
                    </div>
                    {{-- <div
                        class="col-span-1 sm:col-span-2 cursor-pointer bg-gray-100 rounded-xl shadow-md h-72 flex items-center justify-center">
                        <div class="flex flex-col items-center justify-center">
                            <x-icon name="cloud-upload" class="w-16 h-16 text-blue-600" />
                            <p class="text-blue-600">Click to upload logo</p>
                        </div>
                    </div>
                    <div class="hidden">
                        <x-input type=file wire:model.defer="logo" label="School logo"
                            placeholder="School logo path" />
                    </div> --}}
                </x-label>
            </li>

            <li>
                <x-input wire:model.defer="setting.address" label="School address" placeholder="School address" />
            </li>

            <li>
                <x-select label="Academic Year" wire:model.defer="setting.academic_year_id"
                    placeholder="Select academic year">
                    @foreach ($academic_years as $academic_year)
                        <x-select.option value="{{ $academic_year->id }}"
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

    {{-- Contact --}}
    <div class="w-full lg:flex lg:flex-row py-4 gap-4 justify-between">
        <div class="px-4 sm:px-0 lg:w-4/12">
            <h2 class="text-lg font-medium text-text">Contact Information</h2>
            <p class="mt-1 text-sm text-text">Lorem ipsum dolor sit, nobis ea?</p>
        </div>

        <ul
            class="mt-5 lg:flex lg:flex-col lg:w-8/12 p-4 space-y-6 px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md ">
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
                <x-input wire:model.defer="setting.telephone_1" label="School telephone"
                    placeholder="School telephone" />
            </li>
        </ul>
    </div>

    <div class="hidden sm:block">
        <div class="py-8">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    {{-- Features --}}
    <div class="lg:grid lg:grid-cols-3 lg:gap-6">
        <div class="px-4 sm:px-0">
            <h2 class="text-lg font-medium text-text">Features </h2>
            <p class="mt-1 text-sm text-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, ea?
            </p>
        </div>

        <div class="mt-5 lg:mt-0 lg:col-span-2">
            <form wire:submit.prevent="">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 md:col-span-4">
                            <div class="">
                                <x-checkbox id="profile_editing" label="Profile Editing"
                                    wire:model.defer="setting.profile_editing" />
                            </div>

                            <div class="pl-6 mt-3 max-w-xl text-sm text-gray-600">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus possimus sed
                                vero vel pariatur recusandae doloribus, et optio blanditiis autem.
                            </div>
                        </div>

                        <div class="col-span-6 md:col-span-4">
                            <div>
                                <x-checkbox id="notify_grades" label="Notify Grades"
                                    wire:model.defer="setting.notify_grades" />
                            </div>

                            <div class="pl-6 mt-3 max-w-xl text-sm text-gray-600">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus possimus sed
                                vero vel pariatur recusandae doloribus, et optio blanditiis autem.
                            </div>
                        </div>

                        <div class="col-span-6 md:col-span-4">
                            <div>
                                <x-checkbox label="Notify Payments" wire:model.defer="setting.notify_payments" />
                            </div>

                            <div class="pl-6 mt-3 max-w-xl text-sm text-gray-600">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus possimus sed
                                vero vel pariatur recusandae doloribus, et optio blanditiis autem.
                            </div>
                        </div>

                        <div class="col-span-6 md:col-span-4">
                            <div class="pl-6">
                                <x-input wire:model.defer="setting.notification_type" label="Notification Type"
                                    placeholder="School address" />
                            </div>

                            <div class="pl-6 mt-3 max-w-xl text-sm text-gray-600">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus possimus sed
                                vero vel pariatur recusandae doloribus, et optio blanditiis autem.
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

    {{-- Themes --}}
    <div class="lg:grid lg:grid-cols-3 lg:gap-6">
        <div class="px-4 sm:px-0">
            <h2 class="text-lg font-medium text-text">Themes</h2>
            <p class="mt-1 text-sm text-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, ea?
            </p>
        </div>

        <div class="mt-5 lg:mt-0 lg:col-span-2">
            <form wire:submit.prevent="">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 md:col-span-4">
                            <div>
                                <x-label>Color</x-label>
                            </div>

                            <div class="pl-6 mt-3 max-w-xl text-sm text-gray-600 flex justify-between">
                                <label>
                                    <div class="relative">
                                        <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                            @if ($setting->theme_color == 'color1')
                                                <x-icon name="check" class="w-5 h-5 text-white" />
                                            @endif
                                        </div>
                                        <svg viewBox="0 0 24 24" aria-hidden="true" class="w-10 h-10" fill="#1d9bf0">
                                            <g>
                                                <circle cx="12" cy="12" r="10.3"></circle>
                                            </g>
                                        </svg>
                                    </div>
                                    <input class="hidden" wire:model="setting.theme_color" type="radio"
                                        value="color1">
                                </label>

                                <label>
                                    <div class="relative">
                                        <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                            @if ($setting->theme_color == 'color2')
                                                <x-icon name="check" class="w-5 h-5 text-white" />
                                            @endif
                                        </div>
                                        <svg viewBox="0 0 24 24" aria-hidden="true" class="w-10 h-10"
                                            fill="#ffd400">
                                            <g>
                                                <circle cx="12" cy="12" r="10.3"></circle>
                                            </g>
                                        </svg>
                                    </div>
                                    <input class="hidden" wire:model="setting.theme_color" type="radio"
                                        value="color2">
                                </label>

                                <label>
                                    <div class="relative">
                                        <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                            @if ($setting->theme_color == 'color3')
                                                <x-icon name="check" class="w-5 h-5 text-white" />
                                            @endif
                                        </div>
                                        <svg viewBox="0 0 24 24" aria-hidden="true" class="w-10 h-10"
                                            fill="#f91880">
                                            <g>
                                                <circle cx="12" cy="12" r="10.3"></circle>
                                            </g>
                                        </svg>
                                    </div>
                                    <input class="hidden" wire:model="setting.theme_color" type="radio"
                                        value="color3">
                                </label>

                                <label>
                                    <div class="relative">
                                        <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                            @if ($setting->theme_color == 'color4')
                                                <x-icon name="check" class="w-5 h-5 text-white" />
                                            @endif
                                        </div>
                                        <svg viewBox="0 0 24 24" aria-hidden="true" class="w-10 h-10"
                                            fill="#7856ff">
                                            <g>
                                                <circle cx="12" cy="12" r="10.3"></circle>
                                            </g>
                                        </svg>
                                    </div>
                                    <input class="hidden" wire:model="setting.theme_color" type="radio"
                                        value="color4">
                                </label>

                                <label>
                                    <div class="relative">
                                        <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                            @if ($setting->theme_color == 'color5')
                                                <x-icon name="check" class="w-5 h-5 text-white" />
                                            @endif
                                        </div>
                                        <svg viewBox="0 0 24 24" aria-hidden="true" class="w-10 h-10"
                                            fill="#ff7a00">
                                            <g>
                                                <circle cx="12" cy="12" r="10.3"></circle>
                                            </g>
                                        </svg>
                                    </div>
                                    <input class="hidden" wire:model="setting.theme_color" type="radio"
                                        value="color5">
                                </label>

                                <label>
                                    <div class="relative">
                                        <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                            @if ($setting->theme_color == 'color6')
                                                <x-icon name="check" class="w-5 h-5 text-white" />
                                            @endif
                                        </div>
                                        <svg viewBox="0 0 24 24" aria-hidden="true" class="w-10 h-10"
                                            fill="#00ba7c">
                                            <g>
                                                <circle cx="12" cy="12" r="10.3"></circle>
                                            </g>
                                        </svg>
                                    </div>
                                    <input class="hidden" wire:model="setting.theme_color" type="radio"
                                        value="color6">
                                </label>
                            </div>
                        </div>

                        <div class="col-span-6 md:col-span-4">
                            <div>
                                <x-label>Background</x-label>
                            </div>

                            <div class="pl-6 mt-3 max-w-xl text-sm text-gray-600">
                                <div class="grid grid-cols-3 gap-2">
                                    <label for="background_white">
                                        <div
                                            class="p-2 border-2 bg-white {{ $setting->theme_background == 'white' ? 'border-main' : '' }}">

                                            <x-radio id="background_white" value="light-bg" label="White"
                                                wire:model="setting.theme_background" />
                                        </div>
                                    </label>
                                    <label for="background_dim">
                                        <div
                                            class="relative p-2 border-2 {{ $setting->theme_background == 'dim' ? 'border-main' : '' }}">
                                            <div class="absolute left-1 top-1 h-7 w-6 bg-gray-600"></div>

                                            <x-radio id="background_dim" value="dim-bg" label="Dim"
                                                wire:model="setting.theme_background" />
                                        </div>
                                    </label>
                                    <label for="background_black">
                                        <div
                                            class="relative p-2 border-2 text-white {{ $setting->theme_background == 'black' ? 'border-main' : '' }}">
                                            <div class="absolute left-1 top-1 h-7 w-6  bg-black"></div>

                                            <x-radio id="background_black" value="dark-bg" label="Black"
                                                wire:model="setting.theme_background" />
                                        </div>
                                    </label>
                                </div>
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

    {{-- Social Media --}}
    <div class="w-full lg:flex lg:flex-row py-4 gap-4 justify-between">
        <div class="px-4 sm:px-0 lg:w-4/12">
            <h2 class="text-lg font-medium text-text">Social Medias</h2>
            <p class="mt-1 text-sm text-text">Lorem ipsum dolor sit, nobis, ea?</p>
        </div>

        <ul
            class="mt-5 lg:flex lg:flex-col lg:w-8/12 p-4 space-y-6 px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md ">
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
