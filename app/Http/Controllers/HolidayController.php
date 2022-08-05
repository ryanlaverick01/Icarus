<?php

namespace App\Http\Controllers;

use App\Http\Resources\HolidayResource;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    //Return all holidays
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        /**
         * responses = []
         * for each(holiday in Holiday::all()) {
         *  add to responses = new HolidayResource(holiday)
         * }
         */
        return HolidayResource::collection(Holiday::all());
    }
}
