@props(['style' => 'primary', 'tag'])

@switch($style)
    @case('primary')
    <{{ $tag }} {{ $attributes->class(['inline-block rounded-lg px-2 py-1 text-sm text-body hover:bg-slate-100 dark:hover:bg-slate-700 hover:text-title']) }}>{{ $slot }}</{{ $tag }}>
    @break

    @case('secondary')
    <{{ $tag }} {{ $attributes->merge(['class' => 'rounded-md bg-background px-3 py-2 text-sm font-semibold text-title shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 hover:bg-gray-50 dark:hover:bg-gray-50/5 focus:outline-none focus:ring-2 focus:ring-primary-600']) }}>{{ $slot }}</{{ $tag }}>
    @break
@endswitch
