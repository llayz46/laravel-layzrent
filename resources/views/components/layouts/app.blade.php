<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Page Title' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body x-data="{darkMode: false}" :class="{'dark': darkMode === true }" class="antialiased bg-background">
    <header class="bg-background shadow">
        <div class="mx-auto max-w-7xl px-2 sm:px-4 lg:divide-y lg:divide-gray-200 lg:px-8">
            <div class="relative flex h-16 justify-between">
                <div class="relative z-10 flex px-2 lg:px-0">
                    <a href="{{ route('home') }}" class="flex flex-shrink-0 items-center">
                        <x-application-logo
                            class="block h-8 w-auto fill-primary-500 hover:fill-primary-600 transition-colors"/>
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
                                   class="block w-full rounded-md border-0 bg-white py-1.5 pl-10 pr-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                   placeholder="Search" type="search">
                        </div>
                    </div>
                </div>
                <div class="relative z-10 flex items-center lg:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                            aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open menu</span>
                        <!--
                          Icon when menu is closed.

                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                        <!--
                          Icon when menu is open.

                          Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:relative lg:z-10 lg:ml-4 lg:flex lg:items-center">
                    <div class="flex justify-center items-center">
                        <button type="button" @click="darkMode=!darkMode"
                                class="bg-gray-200 dark:bg-primary-500 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 focus:ring-offset-background"
                                role="switch">
                                    <span
                                        class="translate-x-0 dark:translate-x-5 pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
                                        <span
                                            class="opacity-0 duration-200 ease-in absolute inset-0 flex h-full w-full items-center justify-center transition-opacity dark:opacity-100 dark:duration-200 dark:ease-in"
                                            aria-hidden="true">
                                            <svg class="h-3 w-3 text-indigo-600" viewBox="0 0 12 12" fill="currentColor">
                                                <path
                                                    d="M6.48749 11.6624C5.24999 11.6624 4.03124 11.2687 3.03749 10.4999C1.70624 9.48745 0.899994 7.94995 0.806244 6.26245C0.693744 4.2187 1.78124 2.21245 3.54374 1.1437C4.55624 0.543698 5.66249 0.262448 6.82499 0.337448C7.06874 0.356198 7.27499 0.506198 7.34999 0.731198C7.42499 0.956198 7.38749 1.19995 7.21874 1.3687C6.22499 2.36245 5.81249 3.78745 6.11249 5.1562C6.56249 7.19995 8.47499 8.58745 10.5562 8.3812C10.8 8.36245 11.025 8.47495 11.1375 8.6812C11.25 8.88745 11.25 9.1312 11.1 9.3187C10.275 10.4437 9.07499 11.2312 7.70624 11.5312C7.29374 11.6249 6.88124 11.6624 6.48749 11.6624ZM6.24374 1.1812C5.45624 1.2187 4.68749 1.4437 3.97499 1.87495C2.47499 2.77495 1.55624 4.4812 1.64999 6.2062C1.72499 7.64995 2.41874 8.96245 3.54374 9.82495C4.66874 10.6874 6.13124 11.0062 7.51874 10.7062C8.51249 10.4999 9.39374 9.97495 10.0687 9.22495C7.78124 9.2062 5.77499 7.5937 5.26874 5.32495C4.94999 3.86245 5.30624 2.3437 6.24374 1.1812Z"/>
                                            </svg>
                                        </span>

                                        <span
                                            class="opacity-100 duration-100 ease-out absolute inset-0 flex h-full w-full items-center justify-center transition-opacity dark:opacity-0"
                                            aria-hidden="true">
                                            <svg class="h-3 w-3 text-indigo-600" fill="currentColor" viewBox="0 0 12 12">
                                                <path
                                                    d="M5.99995 3.44995C4.5937 3.44995 3.44995 4.5937 3.44995 5.99995C3.44995 7.4062 4.5937 8.54995 5.99995 8.54995C7.4062 8.54995 8.54995 7.4062 8.54995 5.99995C8.54995 4.5937 7.4062 3.44995 5.99995 3.44995ZM5.99995 7.7062C5.06245 7.7062 4.2937 6.93745 4.2937 5.99995C4.2937 5.06245 5.06245 4.2937 5.99995 4.2937C6.93745 4.2937 7.7062 5.06245 7.7062 5.99995C7.7062 6.93745 6.93745 7.7062 5.99995 7.7062Z"/>
                                                <path
                                                    d="M5.99998 2.11873C6.22498 2.11873 6.43123 1.93123 6.43123 1.68748V0.749976C6.43123 0.524976 6.24373 0.318726 5.99998 0.318726C5.77498 0.318726 5.56873 0.506226 5.56873 0.749976V1.70623C5.58748 1.93123 5.77498 2.11873 5.99998 2.11873Z"/>
                                                <path
                                                    d="M5.99998 9.88123C5.77498 9.88123 5.56873 10.0687 5.56873 10.3125V11.25C5.56873 11.475 5.75623 11.6812 5.99998 11.6812C6.22498 11.6812 6.43123 11.4937 6.43123 11.25V10.2937C6.43123 10.0687 6.22498 9.88123 5.99998 9.88123Z"/>
                                                <path
                                                    d="M9.0562 3.37493C9.1687 3.37493 9.2812 3.33743 9.3562 3.24368L9.9562 2.64368C10.125 2.47493 10.125 2.21243 9.9562 2.04368C9.78745 1.87493 9.52495 1.87493 9.3562 2.04368L8.7562 2.64368C8.58745 2.81243 8.58745 3.07493 8.7562 3.24368C8.8312 3.33743 8.9437 3.37493 9.0562 3.37493Z"/>
                                                <path
                                                    d="M2.66248 8.75621L2.06248 9.33746C1.89373 9.50621 1.89373 9.76871 2.06248 9.93746C2.13748 10.0125 2.24998 10.0687 2.36248 10.0687C2.47498 10.0687 2.58748 10.0312 2.66248 9.93746L3.26248 9.33746C3.43123 9.16871 3.43123 8.90621 3.26248 8.73746C3.09373 8.58746 2.81248 8.58746 2.66248 8.75621Z"/>
                                                <path
                                                    d="M11.2499 5.58752H10.2937C10.0687 5.58752 9.86243 5.77502 9.86243 6.01877C9.86243 6.24377 10.0499 6.45003 10.2937 6.45003H11.2499C11.4749 6.45003 11.6812 6.26252 11.6812 6.01877C11.6812 5.77502 11.4749 5.58752 11.2499 5.58752Z"/>
                                                <path
                                                    d="M2.11873 5.99998C2.11873 5.77498 1.93123 5.56873 1.68748 5.56873H0.749976C0.524976 5.56873 0.318726 5.75623 0.318726 5.99998C0.318726 6.22498 0.506226 6.43123 0.749976 6.43123H1.70623C1.93123 6.43123 2.11873 6.22498 2.11873 5.99998Z"/>
                                                <path
                                                    d="M9.33752 8.7562C9.16877 8.58745 8.90627 8.58745 8.73752 8.7562C8.56877 8.92495 8.56877 9.18745 8.73752 9.3562L9.33752 9.9562C9.41252 10.0312 9.52502 10.0875 9.63752 10.0875C9.75002 10.0875 9.86252 10.05 9.93752 9.9562C10.1063 9.78745 10.1063 9.52495 9.93752 9.3562L9.33752 8.7562Z"/>
                                                <path
                                                    d="M2.66248 2.06248C2.49373 1.89373 2.23123 1.89373 2.06248 2.06248C1.89373 2.23123 1.89373 2.49373 2.06248 2.66248L2.66248 3.26248C2.73748 3.33748 2.84998 3.39373 2.96248 3.39373C3.07498 3.39373 3.18748 3.35623 3.26248 3.26248C3.43123 3.09373 3.43123 2.83123 3.26248 2.66248L2.66248 2.06248Z"/>
                                            </svg>
                                        </span>
                                    </span>
                        </button>
                    </div>

                    <!-- Profile dropdown -->
                    <div class="relative ml-4 flex-shrink-0" x-data="{ open: false }" @click.outside="open = false"
                         @close.stop="open = false">
                        <div @click="open = ! open">
                            <button type="button"
                                    class="relative flex rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                     alt="">
                            </button>
                        </div>

                        <div x-show="open"
                             class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
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
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-0">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-1">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-2">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="hidden lg:flex lg:space-x-8 lg:py-2" aria-label="Global">
                <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-900 hover:bg-gray-50 hover:text-gray-900" -->
                <a href="#"
                   class="bg-gray-100 text-gray-900 inline-flex items-center rounded-md py-2 px-3 text-sm font-medium"
                   aria-current="page">Dashboard</a>
                <a href="#"
                   class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Team</a>
                <a href="#"
                   class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Projects</a>
                <a href="#"
                   class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Calendar</a>
            </nav>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <nav class="lg:hidden" aria-label="Global" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-900 hover:bg-gray-50 hover:text-gray-900" -->
                <a href="#" class="bg-gray-100 text-gray-900 block rounded-md py-2 px-3 text-base font-medium"
                   aria-current="page">Dashboard</a>
                <a href="#"
                   class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 block rounded-md py-2 px-3 text-base font-medium">Team</a>
                <a href="#"
                   class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 block rounded-md py-2 px-3 text-base font-medium">Projects</a>
                <a href="#"
                   class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 block rounded-md py-2 px-3 text-base font-medium">Calendar</a>
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
                    <button type="button"
                            class="relative ml-auto flex-shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
                        </svg>
                    </button>
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
    {{ $slot }}
</body>
</html>
