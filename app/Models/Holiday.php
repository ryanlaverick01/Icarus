<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;

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

    protected $with = [
      'hotel',
      'continent',
      'country',
      'city',
      'category',
      'climate',
      'location'
    ];

    public function hotel()
    {
        return $this->hasOne(Hotel::class, 'id', 'hotel_id');
    }

    public function continent()
    {
        return $this->hasOne(Continent::class, 'id', 'continent_id');
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function climate()
    {
        return $this->hasOne(Climate::class, 'id', 'climate_id');
    }

    public function location()
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }
}
