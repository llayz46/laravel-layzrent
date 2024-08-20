<div x-data="{
        bannerVisible: true,
        bannerTimeout: 4000,
     }"
     x-show="bannerVisible"
     x-transition:enter="transition ease-out duration-500"
     x-transition:enter-start="-translate-y-10"
     x-transition:enter-end="translate-y-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="translate-y-0"
     x-transition:leave-end="-translate-y-10"
     x-init="setTimeout(() => { bannerVisible = false }, bannerTimeout)"
     {{ $attributes->class(['fixed top-16 lg:top-28 left-0 w-full h-auto py-2 duration-300 ease-out bg-green-50 dark:bg-green-500/10 ring-1 ring-inset ring-green-600/20 dark:ring-green-500/20 shadow-sm sm:py-0 sm:h-10']) }} x-cloak>
    <div class="flex items-center justify-between w-full h-full px-3 mx-auto max-w-7xl ">
        <a href="#"
           class="flex flex-col w-full h-full text-xs leading-6 duration-150 ease-out sm:flex-row sm:items-center opacity-80 hover:opacity-100">
                <span class="flex items-center">
                    <strong class="font-semibold text-green-700 dark:text-green-400">{{ $precontent }}</strong><span
                            class="hidden w-px h-4 mx-3 rounded-full sm:block bg-neutral-200 dark:bg-neutral-200/25"></span>
                </span>
            <span class="block pt-1 pb-2 leading-none sm:inline sm:pt-0 sm:pb-0 text-title">{{ $content }}</span>
        </a>
        <button @click="bannerVisible=false"
                class="flex items-center flex-shrink-0 translate-x-1 ease-out duration-150 justify-center w-6 h-6 p-1.5 text-title rounded-full hover:bg-gray-100 dark:hover:bg-gray-100/5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-full h-full">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
</div>
