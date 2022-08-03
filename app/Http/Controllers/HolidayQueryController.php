<?php

namespace App\Http\Controllers;

use App\Exceptions\NoHolidaysFoundFromQueryException;
use App\Http\Resources\HolidayResource;
use App\Models\Category;
use App\Models\Climate;
use App\Models\Holiday;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HolidayQueryController extends Controller
{
    /**
     * @throws NoHolidaysFoundFromQueryException
     */
    public function store(Request $request)
    {
        $climate = Climate::where('name', $request->climate)->first();
        $category = Category::where('name', $request->category)->first();
        $location = Location::where('name', $request->location)->first();

        $query = Holiday::
                            where('climate_id', $climate->id)
                            ->where('category_id', $category->id)
                            ->where('location_id', $location->id);

        if($query->count() < 1) {
            throw new NoHolidaysFoundFromQueryException();
        }

        return HolidayResource::collection($query->get());
    }
}
