<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHourhandRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'hour_monday' => 'required|boolean',
            'hour_tuesday' => 'required|boolean',
            'hour_wednesday' => 'required|boolean',
            'hour_thursday' => 'required|boolean',
            'hour_friday' => 'required|boolean',
            'hour_saturday' => 'required|boolean',
            'hour_sunday' => 'required|boolean',
            'hour_start_time' => 'required',
            'hour_end_time' => 'required',
            'status_id' => 'required|integer|exists:tenant.status,id'
        ];
    }
}
