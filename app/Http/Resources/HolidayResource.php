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
            'category' => new CategoryResource($this->whenLoaded('category')) , //Load resource if relationship is loaded.
            'city' => new CityResource($this->whenLoaded('city')), //Load resource if relationship is loaded.
            'climate' => new ClimateResource($this->whenLoaded('climate')), //Load resource if relationship is loaded.
            'continent' => new ContinentResource($this->whenLoaded('continent')), //Load resource if relationship is loaded.
            'country' => new CountryResource($this->whenLoaded('country')), //Load resource if relationship is loaded.
            'hotel' => new HotelResource($this->whenLoaded('hotel')), //Load resource if relationship is loaded.
            'location' => new LocationResource($this->whenLoaded('location')), //Load resource if relationship is loaded.
            'star_rating' => $this->star_rating, //Map 'star_rating' field into response from model.
            'price_per_night' => $this->price_per_night //Map 'price_per_night' field into response from model.
        ];
    }
}
