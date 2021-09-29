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
            'hour_monday' => 'boolean',
            'hour_tuesday' => 'boolean',
            'hour_wednesday' => 'boolean',
            'hour_thursday' => 'boolean',
            'hour_friday' => 'boolean',
            'hour_saturday' => 'boolean',
            'hour_sunday' => 'boolean',
            'status_id' => 'integer|exists:tenant.status,id'
        ];
    }
}
