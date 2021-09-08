<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstituteRequest extends FormRequest
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
            'inst_name' => 'required',
            'city_id' => 'required|integer',
            'status_id' => 'required|integer',
            'type_institute_id' => 'required|integer',
        ];
    }
}