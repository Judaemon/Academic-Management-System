<x-app-layout>
    <x-slot name="header">
        {{ __('System Setting') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        {{-- ang panget into need ifix --}}
        @if ($message = Session::get('success'))
            <div class="inline-flex w-full mb-4 overflow-hidden bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-center w-12 bg-green-500">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                        </path>
                    </svg>
                </div>

                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-green-500">Success</span>
                        <p class="text-sm text-gray-600">{{ $message }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
            <div class="flex justify-center items-center w-12 bg-red-600">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                </svg>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-red-600">Warning</span>
                    <p class="text-sm text-gray-600">You are edting System Setting</p>
                </div>
            </div>
        </div>

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="p-4 bg-white rounded-lg shadow-md overflow-x-auto w-full">
                <form method="POST" action="{{route('setting.update')}}">
                    @csrf
                    @method('PUT')

                    <div class="mt-4">
                        <x-label for="system_name" :value="__('System name')"/>
                        <x-input type="text"
                                 id="system_name"
                                 name="system_name"
                                 class="block w-full"
                                 value="{{ old('setting', $setting->system_name) }}"
                                 required/>
                        @error('name')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <x-label for="system_name" :value="__('School name')"/>
                        <x-input type="text"
                                 id="school_name"
                                 name="school_name"
                                 class="block w-full"
                                 value="{{ old('setting', $setting->school_name) }}"
                                 required/>
                        @error('name')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <x-button class="block w-full">
                            {{ __('Submit') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
