<!DOCTYPE html>
<html x-data="data" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{url(setting('logo'))}}" type="image/x-icon">

    <title>{{ setting('system_name') }}</title>

    @wireUiScripts

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Scripts -->
    <script src="{{ asset('js/init-alpine.js') }}"></script>

    @livewireStyles
</head>
<body>
    <!-- WireUI Dialog -->
    <x-dialog />

    <div class="flex h-screen bg-gray-50" :class="{ 'overflow-hidden': isSideMenuOpen }">

        <!-- Desktop sidebar -->
        @include('teacher.teacher-navigation')
        
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        @include('teacher.teacher-navigation-mobile')

        <div class="flex flex-col flex-1 w-full">

            <!-- Top Menu(Logout and My profile) -->
            @include('teacher.teachertop-menu')

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
