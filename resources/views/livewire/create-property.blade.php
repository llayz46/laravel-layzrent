<div class="mx-auto max-w-full px-2 sm:px-4 lg:px-8">
    <div class="border-b border-gray-200 dark:border-gray-700 pb-2 mt-8">
        <h2 class="text-title font-semibold text-xl">Create a properties</h2>
        <p class="text-body">Create a new properties to rent it !</p>
    </div>

    <div>
        <form class="space-y-12 mt-8 mb-32" wire:submit.prevent="createProperty" enctype="multipart/form-data">
            <x-form.two-column-groups>
                <x-slot:title>Title & description</x-slot:title>
                <x-slot:description>Choose a good title for your property and creates some
                    descriptions</x-slot:description>
                <x-slot:fields>
                    <div class="col-span-full">
                        <x-form.label field="title" label="Property title"/>
                        <x-form.input-text type="text" required placeholder="Lakeside house" field="title"/>
                    </div>

                    <div class="col-span-full">
                        <x-form.label field="housing_description" label="House description"/>
                        <x-form.input-textarea required placeholder="My house have 4 beds, 5 rooms..." field="housing_description"/>
                    </div>

                    <div class="col-span-full">
                        <x-form.label field="exterior_description" label="Exterior description"/>
                        <x-form.input-textarea placeholder="Optionnal" field="exterior_description"/>
                    </div>

                    <div class="col-span-full">
                        <x-form.label field="access_description" label="Access description"/>
                        <x-form.input-textarea placeholder="Optionnal" field="access_description"/>
                    </div>
                </x-slot:fields>
            </x-form.two-column-groups>

            <x-form.two-column-groups>
                <x-slot:title>Property address</x-slot:title>
                <x-slot:description>Please enter the address of your property</x-slot:description>
                <x-slot:fields>
                    <div class="col-span-full">
                        <x-form.label field="country" label="Country"/>
                        <x-form.input-text type="text" required placeholder="France" field="country"/>
                    </div>

                    <div class="col-span-full">
                        <x-form.label field="city" label="City"/>
                        <x-form.input-text type="text" required placeholder="Paris" field="city"/>
                    </div>

                    <div class="col-span-full">
                        <x-form.label field="address" label="Address"/>
                        <x-form.input-text type="text" required placeholder="Avenue des champs élysée" field="address"/>
                    </div>

                    <div class="col-span-full">
                        <x-form.label field="zip_code" label="Zip code"/>
                        <x-form.input-text type="text" required placeholder="75000" field="zip_code"/>
                    </div>
                </x-slot:fields>
            </x-form.two-column-groups>

            <x-form.two-column-groups>
                <x-slot:title>Property details</x-slot:title>
                <x-slot:description>Inform us on the details of your property</x-slot:description>
                <x-slot:fields>
                    <div class="col-span-full">
                        <x-form.label field="rooms" label="Number of rooms"/>
                        <x-form.input-text type="number" required placeholder="3" field="rooms"/>
                    </div>

                    <div class="col-span-full">
                        <x-form.label field="bedrooms" label="Number of bedrooms"/>
                        <x-form.input-text type="number" placeholder="Optionnal" field="bedrooms"/>
                    </div>

                    <div class="col-span-full">
                        <x-form.label field="bathrooms" label="Number of bathrooms"/>
                        <x-form.input-text type="number" placeholder="Optionnal" field="bathrooms"/>
                    </div>

                    <div class="col-span-full">
                        <x-form.label field="beds" label="Number of beds"/>
                        <x-form.input-text type="number" placeholder="Optionnal" field="beds"/>
                    </div>

                    <div class="col-span-full">
                        <x-form.label field="surface" label="Surface"/>
                        <x-form.input-text type="number" placeholder="Optionnal" field="surface"/>
                    </div>

                    <div class="col-span-full">
                        <x-form.label field="price_per_night" label="Price per night"/>
                        <x-form.input-text type="number" required placeholder="250$" field="price_per_night"/>
                    </div>

                    <div class="col-span-full">
                        <x-form.label field="max_guests" label="Maximum guests allowed"/>
                        <x-form.input-text type="number" required placeholder="4" field="max_guests"/>
                    </div>
                </x-slot:fields>
            </x-form.two-column-groups>

            <x-form.two-column-groups>
                <x-slot:title>Property images</x-slot:title>
                <x-slot:description>Select until 5 images</x-slot:description>
                <x-slot:fields>
                    <div class="col-span-full">
                        <x-form.label field="image_main" label="Cover image"/>
                        <x-form.input-text timing="lazy" type="file" field="image_main"/>
                    </div>
                    <div class="col-span-full">
                        <x-form.label field="url" label="Property images (max 4)"/>
                        <x-form.input-text timing="lazy" type="file" field="url" multiple/>
                    </div>
                </x-slot:fields>
            </x-form.two-column-groups>

            <x-form.two-column-groups>
                <x-slot:title>Category</x-slot:title>
                <x-slot:description>Choose or create a category</x-slot:description>
                <x-slot:fields>
                    <div class="col-span-full">
                        <x-form.label field="category" label="Category"/>
                        <x-form.input-text type="text" required placeholder="Lakeside" field="category"/>
                    </div>
                </x-slot:fields>
            </x-form.two-column-groups>

            <x-form.two-column-groups>
                <x-slot:title>Amenities</x-slot:title>
                <x-slot:description>Add some amenities to your property</x-slot:description>
                <x-slot:fields>
                    <div class="col-span-full">
                        <x-form.label field="amenities" label="Amenities"/>
                        <x-form.input-text type="text" required placeholder="Barbecue, TV, Internet" field="amenities"/>
                    </div>
                </x-slot:fields>
            </x-form.two-column-groups>

            <div class="mt-6 mb-32 flex items-center justify-end gap-x-6">
                <button wire:loading.attr="disabled" type="submit" class="flex w-fit justify-center items-center rounded-md bg-primary-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                    Save
                </button>
                @if($this->successMessage)
                    <x-toast>{{ $this->successMessage }}</x-toast>
                @endif
            </div>
        </form>
    </div>
</div>
