<x-app-layout>
    <div class="lg:p-4 lg:flex lg:justify-between items-center">
        <h1 class="text-2xl font-semibold text-main">Settings</h1>

        <div class="overflow-hidden lg:max-w-lg flex justify-between w-full bg-white rounded-lg shadow-md">
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-red-600">Warning</span>
                    <p class="text-sm text-gray-600">You are edting <span class="font-bold">system setting</span> this
                        will affect the whole system.</p>
                </div>
            </div>

            <div class="flex justify-center items-center w-12 bg-red-600">
                <svg class="w-6 h-6 text-white fill-white" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                    </path>
                </svg>
            </div>
        </div>
    </div>

    <div class="lg:p-4 ">
        @livewire('setting.update-institute-profile')
        @livewire('setting.update-theme')
        @livewire('setting.update-feature')
        @livewire('setting.update-setting-contact')
        @livewire('setting.update-setting-social')
    </div>
</x-app-layout>
