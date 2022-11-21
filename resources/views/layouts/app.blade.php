<!DOCTYPE html>
<html x-data="data" lang="en" class="{{ setting('theme_background') }} {{ setting('theme_color') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ url(setting('logo')) }}" type="image/x-icon">

    <title>{{ setting('institute_name') }}</title>

    <link href="https://fonts.bunny.net/css?family=nunito:400,400i,600,600i,700,700i" rel="stylesheet" />

    @wireUiScripts

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Scripts -->
    <script src="{{ asset('js/init-alpine.js') }}"></script>

    @livewireStyles

    <style>
        .la-line-spin-clockwise-fade,
        .la-line-spin-clockwise-fade>div {
            position: relative;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .la-line-spin-clockwise-fade {
            display: block;
            font-size: 0;
            color: #fff;
        }

        .la-line-spin-clockwise-fade.la-dark {
            color: #333;
        }

        .la-line-spin-clockwise-fade>div {
            display: inline-block;
            float: none;
            background-color: currentColor;
            border: 0 solid currentColor;
        }

        .la-line-spin-clockwise-fade {
            width: 32px;
            height: 32px;
        }

        .la-line-spin-clockwise-fade>div {
            position: absolute;
            width: 2px;
            height: 10px;
            margin: 2px;
            margin-top: -5px;
            margin-left: -1px;
            border-radius: 0;
            -webkit-animation: line-spin-clockwise-fade 1s infinite ease-in-out;
            -moz-animation: line-spin-clockwise-fade 1s infinite ease-in-out;
            -o-animation: line-spin-clockwise-fade 1s infinite ease-in-out;
            animation: line-spin-clockwise-fade 1s infinite ease-in-out;
        }

        .la-line-spin-clockwise-fade>div:nth-child(1) {
            top: 15%;
            left: 50%;
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
            -webkit-animation-delay: -.875s;
            -moz-animation-delay: -.875s;
            -o-animation-delay: -.875s;
            animation-delay: -.875s;
        }

        .la-line-spin-clockwise-fade>div:nth-child(2) {
            top: 25.2512626585%;
            left: 74.7487373415%;
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            transform: rotate(45deg);
            -webkit-animation-delay: -.75s;
            -moz-animation-delay: -.75s;
            -o-animation-delay: -.75s;
            animation-delay: -.75s;
        }

        .la-line-spin-clockwise-fade>div:nth-child(3) {
            top: 50%;
            left: 85%;
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            transform: rotate(90deg);
            -webkit-animation-delay: -.625s;
            -moz-animation-delay: -.625s;
            -o-animation-delay: -.625s;
            animation-delay: -.625s;
        }

        .la-line-spin-clockwise-fade>div:nth-child(4) {
            top: 74.7487373415%;
            left: 74.7487373415%;
            -webkit-transform: rotate(135deg);
            -moz-transform: rotate(135deg);
            -ms-transform: rotate(135deg);
            -o-transform: rotate(135deg);
            transform: rotate(135deg);
            -webkit-animation-delay: -.5s;
            -moz-animation-delay: -.5s;
            -o-animation-delay: -.5s;
            animation-delay: -.5s;
        }

        .la-line-spin-clockwise-fade>div:nth-child(5) {
            top: 84.9999999974%;
            left: 50.0000000004%;
            -webkit-transform: rotate(180deg);
            -moz-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            -o-transform: rotate(180deg);
            transform: rotate(180deg);
            -webkit-animation-delay: -.375s;
            -moz-animation-delay: -.375s;
            -o-animation-delay: -.375s;
            animation-delay: -.375s;
        }

        .la-line-spin-clockwise-fade>div:nth-child(6) {
            top: 74.7487369862%;
            left: 25.2512627193%;
            -webkit-transform: rotate(225deg);
            -moz-transform: rotate(225deg);
            -ms-transform: rotate(225deg);
            -o-transform: rotate(225deg);
            transform: rotate(225deg);
            -webkit-animation-delay: -.25s;
            -moz-animation-delay: -.25s;
            -o-animation-delay: -.25s;
            animation-delay: -.25s;
        }

        .la-line-spin-clockwise-fade>div:nth-child(7) {
            top: 49.9999806189%;
            left: 15.0000039834%;
            -webkit-transform: rotate(270deg);
            -moz-transform: rotate(270deg);
            -ms-transform: rotate(270deg);
            -o-transform: rotate(270deg);
            transform: rotate(270deg);
            -webkit-animation-delay: -.125s;
            -moz-animation-delay: -.125s;
            -o-animation-delay: -.125s;
            animation-delay: -.125s;
        }

        .la-line-spin-clockwise-fade>div:nth-child(8) {
            top: 25.2506949798%;
            left: 25.2513989292%;
            -webkit-transform: rotate(315deg);
            -moz-transform: rotate(315deg);
            -ms-transform: rotate(315deg);
            -o-transform: rotate(315deg);
            transform: rotate(315deg);
            -webkit-animation-delay: 0s;
            -moz-animation-delay: 0s;
            -o-animation-delay: 0s;
            animation-delay: 0s;
        }

        .la-line-spin-clockwise-fade.la-sm {
            width: 16px;
            height: 16px;
        }

        .la-line-spin-clockwise-fade.la-sm>div {
            width: 1px;
            height: 4px;
            margin-top: -2px;
            margin-left: 0;
        }

        .la-line-spin-clockwise-fade.la-2x {
            width: 64px;
            height: 64px;
        }

        .la-line-spin-clockwise-fade.la-2x>div {
            width: 4px;
            height: 20px;
            margin-top: -10px;
            margin-left: -2px;
        }

        .la-line-spin-clockwise-fade.la-3x {
            width: 96px;
            height: 96px;
        }

        .la-line-spin-clockwise-fade.la-3x>div {
            width: 6px;
            height: 30px;
            margin-top: -15px;
            margin-left: -3px;
        }

        @-webkit-keyframes line-spin-clockwise-fade {
            50% {
                opacity: .2;
            }

            100% {
                opacity: 1;
            }
        }

        @-moz-keyframes line-spin-clockwise-fade {
            50% {
                opacity: .2;
            }

            100% {
                opacity: 1;
            }
        }

        @-o-keyframes line-spin-clockwise-fade {
            50% {
                opacity: .2;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes line-spin-clockwise-fade {
            50% {
                opacity: .2;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
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

    <div class="flex h-screen bg-bg" :class="{ 'overflow-hidden': isSideMenuOpen }">

        <!-- Desktop sidebar -->
        @include('layouts.navigation')

        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        @include('layouts.navigation-mobile')

        <div class="flex flex-col flex-1 w-full">

            <!-- Top Menu(Logout and My profile) -->
            @include('layouts.top-menu')

            <main class="h-full overflow-y-auto bg-white/10 scrollbar-thin scrollbar-thumb-caret">
                <div class="container p-4 mx-auto grid">
                    {{ $slot }}
                </div>
            </main>
        </div>

    </div>

    @livewire('livewire-ui-modal')
    @livewireScripts

    <div class="hidden">
        <span
            class="
                light-bg dim-bg dark-bg
                color1 color2 color3 color4 color5 color6
            ">
        </span>
    </div>
</body>

</html>
