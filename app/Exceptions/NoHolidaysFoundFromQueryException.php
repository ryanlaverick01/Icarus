<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class NoHolidaysFoundFromQueryException extends Exception
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Constructs exception response.
     *
     * @return JsonResponse
     */
    public function render()
    {
        return response()->json([
            'status' => 404,
            'error' => 'No Holidays Found'
        ], 404);
    }
}
