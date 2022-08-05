<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;

    //Define fields (columns) that can have their values set.
    protected $fillable = [
      'hotel_id',
      'continent_id',
      'country_id',
      'city_id',
      'category_id',
      'climate_id',
      'location_id',
      'star_rating',
      'price_per_night'
    ];

    //Automatically load relationships when the model is loaded.
    protected $with = [
      'hotel',
      'continent',
      'country',
      'city',
      'category',
      'climate',
      'location'
    ];

    //Define relationship to Hotel model using hotel_id as the local key, with record id from Hotel table as foreign key.
    public function hotel()
    {
        return $this->hasOne(Hotel::class, 'id', 'hotel_id');
    }

    //Define relationship to Continent model using continent_id as the local key, with record id from Continent table as foreign key.
    public function continent()
    {
        return $this->hasOne(Continent::class, 'id', 'continent_id');
    }

    //Define relationship to Country model using country_id as the local key, with record id from Country table as foreign key.
    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    //Define relationship to City model using city_id as the local key, with record id from City table as foreign key.
    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    //Define relationship to Category model using category_id as the local key, with record id from Category table as foreign key.
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    //Define relationship to Climate model using climate_id as the local key, with record id from Climate table as foreign key.
    public function climate()
    {
        return $this->hasOne(Climate::class, 'id', 'climate_id');
    }

    //Define relationship to Location model using location_id as the local key, with record id from Location table as foreign key.
    public function location()
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }
}
