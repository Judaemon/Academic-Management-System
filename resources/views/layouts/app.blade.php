<!DOCTYPE html>
<html x-data="data" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{url(setting('logo'))}}" type="image/x-icon">

    <title>{{ setting('institute_name') }}</title>

    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    @wireUiScripts

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Scripts -->
    <script src="{{ asset('js/init-alpine.js') }}"></script>

    @livewireStyles
</head>
<body wire:ignore.self>
    <!-- WireUI Dialog -->
    <x-dialog />

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
