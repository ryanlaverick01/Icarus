<?php

namespace App\Http\Controllers;

use App\Http\Resources\HolidayResource;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function index()
    {
        /**
         * responses = []
         * for each(holiday in Holiday::all()) {
         *  add to responses = new HolidayResource(holiday)
         * }
         */
        return HolidayResource::collection(Holiday::all());
    }

    public function show(Holiday $holiday)
    {
        return new HolidayResource($holiday);
    }
}
