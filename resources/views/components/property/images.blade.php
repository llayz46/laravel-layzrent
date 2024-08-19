<div {{ $attributes->class(['hidden md:flex w-full gap-2 md:mt-4 lg:mt-6']) }} x-data="{ image: 'https://placeholderjs.com/500x500' }">
    <div class="w-1/2">
        <img x-bind:src="image" alt="" dir="ltr" class="size-full object-cover aspect-square rounded-s-lg">
    </div>

    <div class="w-1/2 grid grid-cols-2 gap-2" dir="rtl">
        @for($i = 0; $i < 4; $i++)
            <img src="https://placeholderjs.com/500x500&text={{ $i }}"
                 @click="image = 'https://placeholderjs.com/500x500&text=Hello+World!'" alt=""
                 class="w-full object-cover aspect-square @if($i === 0 || $i === 2) rounded-s-lg @endif">
        @endfor
    </div>
</div>

<div class="max-md:block hidden mt-3 sm:mt-5">
    <img src="https://placeholderjs.com/500x500&text=Hello+World!" alt="" class="w-full object-cover aspect-video">
</div>

{{--    <div class="space-y-4" x-data="{ image: '/{{ $this->product->image->path }}' }">--}}
{{--        <div class="p-5 rounded-lg shadow">--}}
{{--            <img x-bind:src="image" alt="" class="h-fit object-cover">--}}
{{--        </div>--}}

{{--        <div class="grid grid-cols-4 gap-4">--}}
{{--            @foreach($this->product->images as $image)--}}
{{--                <div class="rounded p-2 shadow">--}}
{{--                    <img src="/{{ $image->path }}" @click="image = '/{{ $image->path }}'" alt="" class="w-full object-cover aspect-square">--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
