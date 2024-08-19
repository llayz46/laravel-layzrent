@props(['field'])

<input id="{{ $field }}" name="{{ $field }}"
       type="checkbox" {{ $attributes->class(['h-4 w-4 rounded bg-background border-gray-300 dark:border-gray-700 text-primary-600 focus:ring-primary-600 cursor-pointer']) }}>
