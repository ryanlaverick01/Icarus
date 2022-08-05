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
            $table->id(); //Primary key, auto-incrementing.
            $table->foreignId("hotel_id"); //Declare column name as "hotel_id", data type as UNSIGNED BIGINT.
            $table->foreignId("continent_id"); //Declare column name as "continent_id", data type as UNSIGNED BIGINT.
            $table->foreignId("country_id"); //Declare column name as "country_id", data type as UNSIGNED BIGINT.
            $table->foreignId("city_id")->nullable();  //Declare column name as "city_id", data type as UNSIGNED BIGINT, column can have a null value.
            $table->foreignId("category_id"); //Declare column name as "category_id", data type as UNSIGNED BIGINT.
            $table->foreignId("climate_id"); //Declare column name as "climate_id", data type as UNSIGNED BIGINT.
            $table->foreignId("location_id"); //Declare column name as "location_id", data type as UNSIGNED BIGINT.
            $table->integer("star_rating"); //Declare column name as "star_rating", data type as INT.
            $table->decimal("price_per_night"); //Declare column name as "price_per_night", data type as DECIMAL.
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
