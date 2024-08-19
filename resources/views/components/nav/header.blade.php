<header class="bg-background shadow">
    <div class="mx-auto max-w-full px-2 sm:px-4 lg:divide-y lg:divide-gray-200 lg:dark:divide-gray-700 lg:px-8">
        <div class="relative flex h-16 justify-between">
            <div class="relative z-10 flex px-2 lg:px-0">
                <a href="{{ route('home') }}" wire:navigate.hover class="flex flex-shrink-0 items-center">
                    <x-application-logo class="block h-8 w-auto fill-primary-500 hover:fill-primary-600 transition-colors"/>
                </a>
            </div>
            <div class="relative z-0 flex flex-1 items-center justify-center px-2 sm:absolute sm:inset-0">
                <div class="w-full sm:max-w-xs">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                 aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input id="search" name="search"
                               class="block w-full rounded-md border-0 bg-background py-1.5 pl-10 pr-3 text-title ring-1 ring-inset ring-gray-300 dark:ring-gray-700 focus:ring-2 focus:ring-inset focus:ring-primary-600 dark:focus:ring-primary-600 placeholder:text-body sm:text-sm sm:leading-6"
                               placeholder="Search" type="search">
                    </div>
                </div>
            </div>
            <div class="relative z-10 flex items-center lg:hidden"
                 @click.outside="mobileMenu = false"
                 @close.stop="mobileMenu = false">
                <!-- Mobile menu button -->
                <button type="button" @click="mobileMenu = ! mobileMenu" @click.outside="mobileMenu = false" @close.stop="mobileMenu = false"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-body hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-title focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-600"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open menu</span>

                    <svg class="h-6 w-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path :d="mobileMenu ? 'M6 18L18 6M6 6l12 12' : 'M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5'" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:relative lg:z-10 lg:ml-4 lg:flex lg:items-center">
                <div class="flex justify-center items-center">
                    <x-theme-toggle/>
                </div>

                @guest
                    <x-button tag="a" :href="route('login')" class="ml-4">Sign in</x-button>
                @else
                    <div class="relative ml-4 flex-shrink-0" x-data="{ open: false }" @click.outside="open = false"
                         @close.stop="open = false">
                        <div @click="open = ! open">
                            <button type="button"
                                    class="relative flex rounded-full bg-background focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                     alt="">
                            </button>
                        </div>

                        <div x-show="open"
                             class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-background py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             @click="open = false"
                             role="menu"
                             aria-orientation="vertical"
                             aria-labelledby="user-menu-button"
                             tabindex="-1"
                        >
                            <x-nav.header-link :active="request()->routeIs('home')" href="{{ route('home') }}">test</x-nav.header-link>
                            <x-nav.header-link :active="false" href="{{ route('home') }}">test</x-nav.header-link>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="block w-full px-4 py-2 text-sm text-left text-title hover:bg-gray-50 dark:hover:bg-gray-50/25" role="menuitem">Sign out</button>
                            </form>
                        </div>
                @endguest

                </div>
            </div>
        </div>
        <nav class="hidden lg:flex lg:space-x-8 lg:py-2 lg:px-8" aria-label="Global">
            <x-nav.nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Lakeside</x-nav.nav-link>
            <x-nav.nav-link href="{{ route('home') }}" :active="false">Pool</x-nav.nav-link>
            <x-nav.nav-link href="{{ route('home') }}" :active="false">Campaign</x-nav.nav-link>
            <x-nav.nav-link href="{{ route('home') }}" :active="false">Castle</x-nav.nav-link>
            <x-nav.nav-link href="{{ route('home') }}" :active="false">Seaside</x-nav.nav-link>
        </nav>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <nav class="lg:hidden"
         aria-label="Global"
         x-show="mobileMenu" x-cloak
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-900 hover:bg-gray-50 hover:text-gray-900" -->
            <x-nav.nav-link href="{{ route('home') }}" class="w-full" :active="request()->routeIs('home')">Lakeside</x-nav.nav-link>
            <x-nav.nav-link href="{{ route('home') }}" class="w-full" :active="false">Pool</x-nav.nav-link>
            <x-nav.nav-link href="{{ route('home') }}" class="w-full" :active="false">Campaign</x-nav.nav-link>
            <x-nav.nav-link href="{{ route('home') }}" class="w-full" :active="false">Castle</x-nav.nav-link>
            <x-nav.nav-link href="{{ route('home') }}" class="w-full" :active="false">Seaside</x-nav.nav-link>
        </div>
        <div class="border-t border-gray-200 pb-3 pt-4">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                         alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-gray-800">Tom Cook</div>
                    <div class="text-sm font-medium text-gray-500">tom@example.com</div>
                </div>
                <div class="ml-auto">
                    <x-theme-toggle/>
                </div>
            </div>
            <div class="mt-3 space-y-1 px-2">
                <a href="#"
                   class="block rounded-md px-3 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Your
                    Profile</a>
                <a href="#"
                   class="block rounded-md px-3 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Settings</a>
                <a href="#"
                   class="block rounded-md px-3 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Sign
                    out</a>
            </div>
        </div>
    </nav>
</header>
