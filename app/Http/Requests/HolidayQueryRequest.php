<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HolidayQueryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'climate' => ['required', 'string', 'exists:climates,name'], //Field must exist, be a string, be a valid record within the "climates" table on the "name" column.
            'category' => ['required', 'string', 'exists:categories,name'], //Field must exist, be a string, be a valid record within the "categories" table on the "name" column.
            'location' => ['required', 'string', 'exists:locations,name'] //Field must exist, be a string, be a valid record within the "locations" table on the "name" column.
        ];
    }
}
