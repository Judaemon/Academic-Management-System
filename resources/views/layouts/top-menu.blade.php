<header class="z-10 py-4 bg-bg shadow-md">
    <div class="container flex justify-between items-center px-6 mx-auto h-full text-purple-600 md:justify-end">
        <!-- Mobile hamburger for sidebar-->
        <x-button flat secondary md right-icon="menu-alt-2" @click="toggleSideMenu" aria-label="Menu" class="md:hidden" />

        {{-- Mobile sidebar content --}}
        <x-dropdown>
            <x-slot name="trigger">
                <div>
                    {{-- <x-button label="{{ Auth::user()->first_name }}" flat secondary md right-icon="chevron-down" /> --}}
                </div>
                <div
                    class="flex justify-end space-x-4 w-44 px-4 py-2 text-sm font-medium leading-5 text-center text-text">
                    <span class="float-right">{{ Auth::user()->first_name }}</span>
                    <x-icon name="chevron-down" class="w-4 h-4" />
                </div>
            </x-slot>

            <x-dropdown.item href="{{ route('profile.show') }}">
                <svg class="mr-3 w-4 h-4" aria-hidden="true" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                    </path>
                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>

                <span>My profile</span>
            </x-dropdown.item>

            <x-dropdown.item :href="route('change-password')">
                <svg class="mr-3 w-4 h-4" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                </svg>

                <span>Change Password</span>
            </x-dropdown.item>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown.item :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    <svg class="mr-3 w-4 h-4" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                        </path>
                    </svg>

                    <span>Log Out</span>
                </x-dropdown.item>
            </form>
        </x-dropdown>
    </div>
</header>
