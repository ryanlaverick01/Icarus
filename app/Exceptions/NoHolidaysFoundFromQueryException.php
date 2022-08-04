<?php

namespace App\Exceptions;

use Exception;

class NoHolidaysFoundFromQueryException extends Exception
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        return response()->json([
            'status' => 404,
            'error' => 'No Holidays Found'
        ], 404);
    }
}
