<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function index()
    {
        return Holiday::all();
    }

    public function show(Holiday $holiday)
    {
        return $holiday;
    }
}
