<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();

            // Description
            $table->string('housing_description', 500);
            $table->string('exterior_description', 500)->nullable();
            $table->string('access_description', 500)->nullable();

            // Location
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('zip_code');

            // Details
            $table->unsignedInteger('rooms');
            $table->unsignedInteger('bedrooms')->nullable();
            $table->unsignedInteger('bathrooms')->nullable();
            $table->unsignedInteger('beds')->nullable();
            $table->unsignedInteger('surface')->nullable();
            $table->unsignedInteger('price_per_night');
            $table->unsignedInteger('max_guests');

            // Status
            $table->boolean('active')->default(true);

            // Foreign key
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Timestamps
            $table->timestamps();
        });

        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('price_per_night');
            $table->timestamps();
        });

        Schema::create('property_images', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->boolean('main')->default(false);
            $table->timestamps();
        });

        Schema::create('property_amenity', function (Blueprint $table) {
            $table->primary(['property_id', 'amenity_id']);
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->foreignId('amenity_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('amenities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
        Schema::dropIfExists('reservations');
        Schema::dropIfExists('property_images');
        Schema::dropIfExists('property_amenity');
        Schema::dropIfExists('amenities');
    }
};
