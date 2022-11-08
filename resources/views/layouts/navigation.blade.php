<aside
    class="scrollbar-thin scrollbar-thumb-teal-300 scrollbar-thumb-rounded-full z-10 hidden w-64 overflow-y-auto bg-blue-900 md:block flex-shrink-0">
    <div class="py-4 text-gray-500">
        <a class="" href="{{ route('dashboard') }}">
            <div class="flex flex-row items-center px-4">
                <img aria-hidden="true" class="h-10" src="{{ asset(setting('logo')) }}" alt="logo" />

                <h1 class="ml-4 text-2xl font-bold text-white">{{ setting('institute_acronym') }}</h1>
            </div>
        </a>

        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </x-slot>
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>

            @can('view_users')
                <li class="relative px-6 py-3">
                    <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                        <x-slot name="icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </x-slot>
                        {{ __('Users') }}
                    </x-nav-link>
                </li>
            @endcan

            {{-- need can and endcan for admission --}}
            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('admissions.index') }}" :active="request()->routeIs('admissions.index')">
                    <x-slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                        </svg>
                    </x-slot>
                    {{ __('Admission') }}
                </x-nav-link>
            </li>

            @can('view_grades')
                <li class="relative px-6 py-3">
                    <x-nav-link href="{{ route('student_grades.index') }}" :active="request()->routeIs('student_grades.index')">
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                            </svg> 
                        </x-slot>
                        {{ __('View Grades') }}
                    </x-nav-link>
                </li>
            @endcan

            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('teacher_grades.index') }}" :active="request()->routeIs('teacher_grades.index')">
                    <x-slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg>
                    </x-slot>
                    {{ __('Assign Grades') }}
                </x-nav-link>
            </li>              

            {{-- Accounting: isAccountingMenuOpen --}}
            @canany(['view_fees', 'view_payments'])
                <li class="relative px-6 py-3">
                    <button
                        class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 text-white hover:text-my_secondary"
                        @click="toggleAccountingMenu" aria-haspopup="true">
                        <span class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V13.5zm0 2.25h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V18zm2.498-6.75h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V13.5zm0 2.25h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V18zm2.504-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zm0 2.25h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V18zm2.498-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zM8.25 6h7.5v2.25h-7.5V6zM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0012 2.25z" />
                            </svg>
                            <span class="ml-4">Accounting</span>
                        </span>
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                    </button>
                    <template x-if="isAccountingMenuOpen">
                        <ul x-transition:enter="transition-all ease-in-out duration-300"
                            x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                            x-transition:leave="transition-all ease-in-out duration-300"
                            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium rounded-md shadow-inner bg-white/10"
                            aria-label="submenu">

                            @can('view_fees')
                                <li class="relative px-6 py-3">
                                    <x-nav-link href="{{ route('fees.index') }}" :active="request()->routeIs('fees.index')">
                                        <x-slot name="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                            </svg>
                                        </x-slot>
                                        {{ __('Fees') }}
                                    </x-nav-link>
                                </li>
                            @endcan

                            @can('view_payments')
                                <li class="relative px-6 py-3">
                                    <x-nav-link href="{{ route('payments.index') }}" :active="request()->routeIs('payments.index')">
                                        <x-slot name="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 14.25l6-6m4.5-3.493V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185zM9.75 9h.008v.008H9.75V9zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm4.125 4.5h.008v.008h-.008V13.5zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                            </svg>

                                        </x-slot>
                                        {{ __('Payments') }}
                                    </x-nav-link>
                                </li>
                            @endcan
                        </ul>
                    </template>
                </li>
            @endcanany

            {{-- Academic: isAcademicMenuOpen --}}
            @canany(['view_sections', 'view_subjects', 'view_grade_levels'])
                <li class="relative px-6 py-3">
                    <button
                        class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 text-white hover:text-my_secondary"
                        @click="toggleAcademicMenu" aria-haspopup="true">
                        <span class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                            </svg>
                            <span class="ml-4">Academic</span>
                        </span>
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                    </button>
                    <template x-if="isAcademicMenuOpen">
                        <ul x-transition:enter="transition-all ease-in-out duration-300"
                            x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                            x-transition:leave="transition-all ease-in-out duration-300"
                            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium rounded-md shadow-inner bg-white/10"
                            aria-label="submenu">

                            @can('view_sections')
                                <li class="relative px-6 py-3">
                                    <x-nav-link href="{{ route('sections.index') }}" :active="request()->routeIs('sections.index')">
                                        <x-slot name="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                            </svg>
                                        </x-slot>
                                        {{ __('Sections') }}
                                    </x-nav-link>
                                </li>
                            @endcan

                            @can('view_subjects')
                                <li class="relative px-6 py-3">
                                    <x-nav-link href="{{ route('subjects.index') }}" :active="request()->routeIs('subjects.index')">
                                        <x-slot name="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                        </x-slot>
                                        {{ __('Subjects') }}
                                    </x-nav-link>
                                </li>
                            @endcan

                            @can('view_grade_levels')
                                <li class="relative px-6 py-3">
                                    <x-nav-link href="{{ route('grade_level.index') }}" :active="request()->routeIs('grade_level.index')">
                                        <x-slot name="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                            </svg>
                                        </x-slot>
                                        {{ __('Grade Levels') }}
                                    </x-nav-link>
                                </li>
                            @endcan
                        </ul>
                    </template>
                </li>
            @endcanany


            {{-- Admin:  isAdminMenuOpen --}}
            @canany(['view_academic_year', 'view_roles', 'view_setting'])
                <li class="relative px-6 py-3">
                    <button
                        class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 text-white hover:text-my_secondary"
                        @click="toggleAdminMenu" aria-haspopup="true">
                        <span class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" stroke="currentColor"
                                class="w-5 h-5 fill-white" viewBox="0 0 448 512">
                                <path
                                    d="M398.1 343.4l-10.59-10.59l42.84-85.69c2.469-4.953 2.219-10.84-.6875-15.56C426.7 226.9 421.5 224 416 224h-68.54c2.674-10.29 4.534-20.89 4.534-32c0-8.844-7.155-16-15.1-16S320 183.2 320 192c0 52.94-43.06 96-96 96S128 244.9 128 192c0-8.844-7.156-16-16-16S96 183.2 96 192.1C96 203.2 97.85 213.7 100.5 224H32C26.47 224 21.31 226.9 18.38 231.6c-2.906 4.719-3.156 10.61-.6875 15.56l42.84 85.69l-10.59 10.59C17.75 375.6 0 418.5 0 464C0 490.5 21.53 512 48 512h128c5.031 0 9.75-2.359 12.78-6.359c3.031-4.016 3.969-9.203 2.594-14.03l-32-112c-2.406-8.5-11.25-13.41-19.78-11c-8.5 2.438-13.41 11.3-10.97 19.78L154.8 480H48C39.19 480 32 472.8 32 464c0-37 14.41-71.78 40.56-97.94l18.75-18.75c4.875-4.875 6.094-12.31 3-18.47L57.88 256H112c.5762 0 1.064-.2695 1.625-.3281C135.8 293.9 176.7 320 223.1 320s88.22-26.08 110.4-64.33C334.9 255.7 335.4 256 336 256h54.13l-36.44 72.84c-3.094 6.156-1.875 13.59 3 18.47l18.75 18.75C401.6 392.2 416 427 416 464c0 8.828-7.188 16-16 16h-106.8l26.16-91.61c2.438-8.484-2.469-17.34-10.97-19.78c-8.625-2.422-17.38 2.5-19.78 11l-32 112c-1.375 4.828-.4375 10.02 2.594 14.03C262.3 509.6 266.1 512 272 512h128c26.47 0 48-21.53 48-48C448 418.5 430.3 375.6 398.1 343.4zM224 160c137.1 0 185.3-46.7 187.3-48.69c6.188-6.188 6.188-16.14 .0625-22.42c-6.125-6.25-16.19-6.359-22.56-.3438c-.2363 .2266-14.79 13.46-50.68 24.54C326.3 58.53 306.8 0 277.1 0c-9.156 0-18.34 3.969-27.34 11.83c-14.94 13.11-36.66 13.06-51.53-.0469C189.3 3.969 179.9 0 170.7 0C141.4 0 121.9 58.55 109.9 113.1C74.36 102.2 59.73 89.07 59.19 88.56c-6.219-6.141-16.28-6.078-22.5 .125c-6.25 6.25-6.25 16.38 0 22.62C38.69 113.3 86.94 160 224 160zM172.9 32.81c1 .5469 2.406 1.469 4.188 3.031c27.12 23.91 66.59 23.88 93.72 .0625c1.719-1.5 3.094-2.422 4.094-3c4.857 5.486 18.67 26.19 32.08 87.83C284.8 125 257.5 128 224 128C190.6 128 163.3 125 141 120.7C154.8 57.83 168.3 37.92 172.9 32.81zM272 368c0-8.844-7.156-16-16-16H192c-8.844 0-16 7.156-16 16S183.2 384 192 384h16v112c0 8.844 7.156 16 16 16s16-7.156 16-16V384H256C264.8 384 272 376.8 272 368z" />
                            </svg>
                            <span class="ml-4">Administrator</span>
                        </span>
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                    </button>
                    <template x-if="isAdminMenuOpen">
                        <ul x-transition:enter="transition-all ease-in-out duration-300"
                            x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                            x-transition:leave="transition-all ease-in-out duration-300"
                            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium rounded-md shadow-inner bg-white/10"
                            aria-label="submenu">

                            @can('view_academic_years')
                                <li class="relative px-6 py-3">
                                    <x-nav-link href="{{ route('academic_year.index') }}" :active="request()->routeIs('academic_year.index')">
                                        <x-slot name="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                            </svg>
                                        </x-slot>
                                        {{ __('Academic Year') }}
                                    </x-nav-link>
                                </li>
                            @endcan

                            @can('view_roles')
                                <li class="relative px-6 py-3">
                                    <x-nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.index')">
                                        <x-slot name="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                            </svg>
                                        </x-slot>
                                        {{ __('Roles and Permission') }}
                                    </x-nav-link>
                                </li>
                            @endcan

                            @can('view_setting')
                                <li class="relative px-6 py-3">
                                    <x-nav-link href="{{ route('setting.index') }}" :active="request()->routeIs('setting.index')">
                                        <x-slot name="icon">
                                            <svg class="h-5 w-5" aria-hidden="true" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </x-slot>
                                        {{ __('Settings') }}
                                    </x-nav-link>
                                </li>
                            @endcan

                        </ul>
                    </template>
                </li>
            @endcanany

            {{-- student --}}
            {{-- student --}}

            {{-- teacher --}}
            {{-- teacher --}}

            {{-- random stuff --}}
            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                            </path>
                        </svg>
                    </x-slot>
                    {{ __('About us') }}
                </x-nav-link>
            </li>
        </ul>
    </div>
</aside>
