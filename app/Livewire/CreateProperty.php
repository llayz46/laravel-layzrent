<?php

namespace App\Livewire;

use App\Models\Amenity;
use App\Models\Category;
use App\Models\PropertyImage;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProperty extends Component
{
    use WithFileUploads;

    #[Validate('required', 'string', 'max:255', 'min:3', 'unique:properties,title')]
    public string $title;

    #[Validate('required', 'string', 'max:500', 'min:3')]
    public string $housing_description;

    #[Validate('string', 'max:500', 'min:3')]
    public string $exterior_description;

    #[Validate('string', 'max:500', 'min:3')]
    public string $access_description;

    #[Validate('required', 'string', 'max:50', 'min:3')]
    public string $country;

    #[Validate('required', 'string', 'max:100', 'min:3')]
    public string $city;

    #[Validate('required', 'string', 'max:100', 'min:3')]
    public string $address;

    #[Validate('required', 'string', 'max:100', 'min:3')]
    public string $zip_code;

    #[Validate('required', 'string', 'numeric', 'max:30', 'min:1')]
    public string $rooms;

    #[Validate('string', 'numeric', 'max:30', 'min:1')]
    public string $bedrooms;

    #[Validate('string', 'numeric', 'max:30', 'min:1')]
    public string $bathrooms;

    #[Validate('string', 'numeric', 'max:30', 'min:1')]
    public string $beds;

    #[Validate('string', 'numeric', 'max:1000', 'min:1')]
    public string $surface;

    #[Validate('required', 'string', 'numeric', 'max:5000', 'min:1')]
    public string $price_per_night;

    #[Validate('required', 'string', 'numeric', 'max:50', 'min:1')]
    public string $max_guests;

    #[Validate('required', 'image', 'max:5000', 'mimes:jpeg,jpg,png,webp')]
    public $image_main;

    #[Validate('required', 'image', 'max:5000', 'mimes:jpeg,jpg,png,webp')]
    public $url;

    #[Validate('required', 'string', 'max:100', 'min:3')]
    public string $category;

    #[Validate('required', 'string', 'max:255', 'min:1')]
    public string $amenities;

    public function createProperty()
    {
        $data = $this->validate();

        $category = Category::firstOrCreate([
            'name' => $this->category,
            'slug' => Str::slug($this->category),
        ]);

        $property = \App\Models\Property::create([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'housing_description' => $data['housing_description'],
            'exterior_description' => $data['exterior_description'],
            'access_description' => $data['access_description'],
            'country' => $data['country'],
            'city' => $data['city'],
            'address' => $data['address'],
            'zip_code' => $data['zip_code'],
            'rooms' => $data['rooms'],
            'bedrooms' => $data['bedrooms'],
            'bathrooms' => $data['bathrooms'],
            'beds' => $data['beds'],
            'surface' => $data['surface'],
            'price_per_night' => $data['price_per_night'],
            'max_guests' => $data['max_guests'],
            'active' => true,
            'user_id' => auth()->id(),
            'category_id' => $category->id,
        ]);

        $this->image_main->store('properties');
        PropertyImage::create([
            'url' => $this->image_main->hashName(),
            'property_id' => $property->id,
            'main' => true,
        ]);

        foreach ($this->url as $key => $image) {
            $image->store('properties');
            PropertyImage::create([
                'url' => $image->hashName(),
                'property_id' => $property->id,
                'main' => false,
            ]);
        }

        $amenities = explode(', ', strtolower($data['amenities']));
        foreach ($amenities as $amenity) {
            $current = Amenity::firstOrCreate([
                'name' => $amenity,
                'icon' => 'icon',
            ]);

            $property->amenities()->attach($current->id);
        }

        $this->reset();

        $this->successMessage = 'Property created successfully!';
    }

    public string $successMessage = '';

    public function render()
    {
        return view('livewire.create-property');
    }
}
