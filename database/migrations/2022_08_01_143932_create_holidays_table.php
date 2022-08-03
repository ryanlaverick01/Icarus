<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->id();
            $table->foreignId("hotel_id");
            $table->foreignId("continent_id");
            $table->foreignId("country_id");
            $table->foreignId("city_id")->nullable();
            $table->foreignId("category_id");
            $table->foreignId("climate_id");
            $table->foreignId("location_id");
            $table->integer("star_rating");
            $table->decimal("price_per_night");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holidays');
    }
};
