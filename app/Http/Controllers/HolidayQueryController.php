<?php

namespace App\Http\Controllers;

use App\Exceptions\NoHolidaysFoundFromQueryException;
use App\Http\Requests\HolidayQueryRequest;
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
    public function store(HolidayQueryRequest $request)
    {
        /*
        * Returns first record within corresponding database table where name
        * matches passed in parameter. This parameter is accessed using
        * $request->parameter syntax. I do not have to worry about no record
        * being found due to the FormRequest validation performed by the
        * HolidayQueryRequest class, as only values within that respective table
        * will be accepted.
        */
        $climate = Climate::where('name', $request->climate)->first();
        $category = Category::where('name', $request->category)->first();
        $location = Location::where('name', $request->location)->first();

        /*
        * Constructs query using ID field of records returned above.
        */
        $query = Holiday::where('climate_id', $climate->id)
            ->where('category_id', $category->id)
            ->where('location_id', $location->id);

        /*
        * Check if query has any results, if not throw an error.
        */
        if($query->count() < 1) {
            throw new NoHolidaysFoundFromQueryException();
        }

        /*
        * If holiday records returned, pass them through the HolidayResource
        * before passing data back to the user/UI.
        */
        return HolidayResource::collection($query->get());
    }
}
