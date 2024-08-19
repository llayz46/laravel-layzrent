@props(['field'])

<input id="{{ $field }}" name="{{ $field }}" wire:model.blur="{{ $field }}"
       required {{ $attributes->class(['block w-full bg-background rounded-md border-0 py-1.5 pl-3 text-title shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 dark:focus:ring-primary-600 sm:text-sm sm:leading-6', 'ring-red-600' => $errors->has($field)]) }}>

@error($field)
<p class="mt-2 text-sm text-red-600">{{ $message }}</p>
@enderror
