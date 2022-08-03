<?php

use App\Http\Controllers\HolidayController;
use App\Http\Controllers\HolidayQueryController;
use App\Models\Holiday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/holidays', [HolidayController::class, 'index']);
Route::post('/holidays', [HolidayQueryController::class, 'store']);
