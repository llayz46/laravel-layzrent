@props(['active'])

@php
$classes = 'inline-flex items-center rounded-md py-2 px-3 text-sm font-medium transition focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2';

$active ? $classes .= ' bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-800 text-title' : $classes .= ' text-title hover:text-body';
@endphp

<a {{ $active ? 'aria-current=page' : '' }}  {{ $attributes->merge(['class' => $classes]) }} wire:navigate>{{ $slot }}</a>
