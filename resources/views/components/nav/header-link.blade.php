@props(['active'])

<a class="block px-4 py-2 text-sm text-title hover:bg-gray-50 dark:hover:bg-gray-50/25 {{ $active ? 'bg-gray-100 dark:bg-gray-100/5' : '' }}" {{ $attributes }} role="menuitem">{{ $slot }}</a>
