<x-guest-layout>
    <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full"
                src="{{ asset('images/system/bg/login-office.jpeg') }}" alt="Office" />
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 text-2xl font-bold text-gray-700">
                    Login
                </h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <x-input name="email" label="Email" placeholder="caims@edu.gmail.com" autofocus />
                    </div>

                    <div class="mb-4">
                        <x-input type="password" name="password" label="Password" placeholder="Secret Password"
                            autofocus />
                    </div>

                    <div class="flex mt-6 text-sm">
                        <x-checkbox class="text-gray-700!" name="remember_me" md label="Remember me" />
                    </div>

                    <div class="mt-4">
                        <x-button type="submit" label="Log in" positive class="w-full" />
                    </div>
                </form>

                <hr class="mt-10 mb-8" />

                @if (Route::has('password.request'))
                    <p class="mt-4">
                        <a class="text-sm font-medium text-secondary-600 hover:underline"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>
