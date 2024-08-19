@props(['field', 'label', 'type' => 'text'])

@switch($type)
    @case('checkbox')
        <label for="{{ $field }}" {{ $attributes->class(['ml-3 block text-sm leading-6 text-title']) }}>{{ $label }}</label>
        @break
    @case('text')
        <label for="{{ $field }}" {{ $attributes->class(['block text-sm font-medium leading-6 text-title']) }}>
            {{ $label }}
        </label>
        @break
@endswitch
