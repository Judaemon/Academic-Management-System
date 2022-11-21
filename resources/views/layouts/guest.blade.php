<!DOCTYPE html>
<html x-data="data" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="icon" href="{{ url(setting('logo')) }}" type="image/x-icon">

    <title>{{ setting('institute_name') }}</title>

    @wireUiScripts

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/init-alpine.js') }}"></script>
</head>

<body>

    <div class="flex-col items-center min-h-screen p-6 bg-gray-50">
        <div class="mt-2 w-full text-center mb-4 text-2xl font-bold text-gray-700">
            <div class="hidden md:flex justify-center items-center">
                <div class="mr-4">
                    <img aria-hidden="true" class="h-20" src="{{ asset(setting('logo')) }}" alt="logo" />
                </div>
                {{ setting('institute_name') }} AIMS
            </div>

            <div class="md:hidden flex justify-center items-center">
                <div class="mr-4">
                    <img aria-hidden="true" class="h-20" src="{{ asset(setting('logo')) }}" alt="logo" />
                </div>
                {{ setting('institute_acronym') }} AIMS
            </div>
        </div>

        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl">
            {{ $slot }}
        </div>
    </div>

    @livewireScripts

</body>

</html>
