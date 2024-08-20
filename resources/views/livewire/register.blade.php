<div class="flex flex-col justify-center py-20 sm:py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-application-logo class="mx-auto h-10 w-auto text-primary-500" />
        </a>
        <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-title">Create a new account</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
        <div class="bg-background px-6 py-12 shadow sm:rounded-lg sm:px-12">
            <form class="space-y-6" wire:submit.prevent="register" method="POST">
                <div class="flex gap-2 w-full">
                    <div class="space-y-2 w-1/2">
                        <x-form.label field="first_name" label="First name"/>
                        <x-form.input-text type="text" autocomplete="given-name" placeholder="John" field="first_name"/>
                    </div>
                    <div class="space-y-2 w-1/2">
                        <x-form.label field="last_name" label="Last name"/>
                        <x-form.input-text type="text" autocomplete="family-name" placeholder="Doe" field="last_name"/>
                    </div>
                </div>

                <div class="space-y-2">
                    <x-form.label field="email" label="Email address"/>
                    <x-form.input-text type="email" autocomplete="email" placeholder="john@doe.com" field="email"/>
                </div>

                <div class="space-y-2">
                    <x-form.label field="password" label="Password"/>
                    <x-form.input-text type="password" autocomplete="current-password" timing="defer" placeholder="Must be at least 8 characters" field="password"/>
                </div>

                <div class="space-y-2">
                    <x-form.label field="password_confirmation" label="Password confirmation"/>
                    <x-form.input-text type="password" field="password_confirmation"/>
                </div>

                <x-form.button>Sign up</x-form.button>
            </form>

            <div>
                <div class="relative mt-10">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t order-gray-200 dark:border-gray-700"></div>
                    </div>
                    <div class="relative flex justify-center text-sm font-medium leading-6">
                        <span class="bg-background px-6 text-title">Or sign in</span>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('login') }}" class="flex w-full items-center justify-center gap-3 rounded-md bg-background px-3 py-2 text-sm font-semibold leading-6 text-title shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/10 focus-visible:ring-transparent">
                        Sign in
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
