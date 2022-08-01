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

    public function hotel()
    {
        return $this->hasOne(Hotel::class);
    }

    public function continent()
    {
        return $this->hasOne(Continent::class);
    }

    public function country()
    {
        return $this->hasOne(Country::class);
    }

    public function city()
    {
        return $this->hasOne(City::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function climate()
    {
        return $this->hasOne(Climate::class);
    }

    public function location()
    {
        return $this->hasOne(Location::class);
    }
}
