<x-app-layout>
    <x-slot name="header">
        {{ __('My profile') }}
    </x-slot>

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

    <div class="p-4 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-700">My Profile</h2>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mt-4">
                <h1>First Name</h1>
                <x-label for="Firstname" :value="__('First Name')"/>
                <x-input readonly type="text"
                         id="firstname"
                         name="firstname"
                         class="block w-full"
                         value="{{ old('firstname', auth()->user()->firstname) }}"
                         required/>
                @error('firstname')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                <h1>Middle Name</h1>
                <x-label for="Lastname" :value="__('Middle Name')"/>
                <x-input readonly type="text"
                         id="middlename"
                         name="middlename"
                         class="block w-full"
                         value="{{ old('middlename', auth()->user()->middlename) }}"
                         required/>
                @error('middlename')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                <h1>Last Name</h1>
                <x-label for="Lastname" :value="__('Last Name')"/>
                <x-input readonly type="text"
                         id="lastname"
                         name="lastname"
                         class="block w-full"
                         value="{{ old('lastname', auth()->user()->lastname) }}"
                         required/>
                @error('lastname')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                <h1>E-Mail</h1>
                <x-label for="email" :value="__('Email')"/>
                <x-input readonly name="email"
                         type="email"
                         class="block w-full"
                         value="{{ old('email', auth()->user()->email) }}"
                         required/>
                @error('email')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                <h1>Address</h1>
                <x-label for="address" :value="__('Address')"/>
                <x-input readonly name="address"
                         type="address"
                         class="block w-full"
                         value="{{ old('address', auth()->user()->address) }}"
                         required/>
                @error('address')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                <h1>Mobile Number</h1>
                <x-label for="address" :value="__('Mobile Number')"/>
                <x-input readonly name="mobilenumber"
                         type="mobilenumber"
                         class="block w-full"
                         value="{{ old('mobilenumber', auth()->user()->mobilenumber) }}"
                         required/>
                @error('mobilenumber')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <br>
            <h2 class="text-base font-semibold text-gray-700">Edit Details:</h2>

            <div class="mt-4">
                <h1>Address</h1>
                <x-label for="address" :value="__('Address')"/>
                <x-input name="address"
                         type="address"
                         class="block w-full"
                         placeholder="Unit, Street, Barangay, City/Municipality"
                         required/>
                @error('address')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                <h1>Mobile Number</h1>
                <x-label for="address" :value="__('Mobile Number')"/>
                <x-input name="mobilenumber"
                         type="mobilenumber"
                         class="block w-full"
                         placeholder="New mobile number"
                         required/>
                @error('mobilenumber')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                <h1>Password</h1>
                <x-label for="password" :value="__('New password')"/>
                <x-input type="password"
                         name="password"
                         class="block w-full"
                         placeholder="Enter your password"
                         required/>
                @error('password')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                <h1>Confirm Password</h1>
                <x-label id="password_confirmation" :value="__('New password confirmation')"/>
                <x-input type="password"
                         name="password_confirmation"
                         class="block w-full"
                         placeholder="Re-type Password"
                         required/>
            </div>

            <div class="mt-4">
                <x-button class="block w-32" type="submit">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
