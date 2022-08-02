<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HolidayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'category' => new CategoryResource($this->whenLoaded('category')) ,
            'city' => new CityResource($this->whenLoaded('city')),
            'climate' => new ClimateResource($this->whenLoaded('climate')),
            'continent' => new ContinentResource($this->whenLoaded('continent')),
            'country' => new CountryResource($this->whenLoaded('country')),
            'hotel' => new HotelResource($this->whenLoaded('hotel')),
            'location' => new LocationResource($this->whenLoaded('location')),
            'star_rating' => $this->star_rating,
            'price_per_night' => $this->price_per_night
        ];
    }
}
