<div class="flex flex-col items-center w-fit mx-auto">
    <a href="{{ route('property.show', ['Property' => 1, 'slug' => 'test']) }}" wire:navigate>
        <img class="rounded-lg" src="https://placeholderjs.com/500x500" alt="">
        <div class="mr-auto mt-2">
            <h3 class="font-semibold text-title">Toulouse, France</h3>
            <p class="text-body">Hôte : John</p>
            <p class="text-body">20-25 janv.</p>
        </div>
    </a>
    <h3 class="text-title mt-1 mr-auto"><span class="font-semibold">100 €</span> par nuit</h3>
</div>
