<!DOCTYPE html>
<html x-data="data" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ url(setting('logo')) }}" type="image/x-icon">

    <title>{{ setting('institute_name') }}</title>

    <link href="https://fonts.bunny.net/css?family=nunito:400,400i,600,600i,700,700i" rel="stylesheet" />

    {{-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

    @wireUiScripts

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Scripts -->
    <script src="{{ asset('js/init-alpine.js') }}"></script>

    @livewireStyles
</head>

<body>
    <!-- WireUI Dialog -->
    <x-dialog />

    {{-- Livewire Modal --}}
    <div class="hidden">
        {{-- Livewire Modal --}}
        {{-- https://github.com/wire-elements/modal/issues/150 --}}
        <span class="sm:max-w-sm"></span>
        <span class="sm:max-w-md"></span>
        <span class="md:max-w-lg"></span>
        <span class="md:max-w-xl"></span>
        <span class="lg:max-w-2xl"></span>
        <span class="lg:max-w-3xl"></span>
        <span class="xl:max-w-4xl"></span>
        <span class="xl:max-w-5xl"></span>
        <span class="2xl:max-w-6xl"></span>
        <span class="2xl:max-w-7xl"></span>
    </div>

    <div class="flex h-screen bg-gray-50" :class="{ 'overflow-hidden': isSideMenuOpen }">

        <!-- Desktop sidebar -->
        @include('layouts.navigation')

        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        @include('layouts.navigation-mobile')

        <div class="flex flex-col flex-1 w-full">

            <!-- Top Menu(Logout and My profile) -->
            @include('layouts.top-menu')

            <main class="h-full overflow-y-auto">
                <div class="container p-4 mx-auto grid">
                    {{ $slot }}
                </div>
            </main>
        </div>

    </div>

    @livewire('livewire-ui-modal')
    @livewireScripts
</body>

</html>
