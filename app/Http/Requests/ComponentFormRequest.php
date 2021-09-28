<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComponentFormRequest extends FormRequest
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
            //'com_acronym' => 'required|string|unique:tenant.components,com_acronym',
            'com_acronym' => 'required|string',
            'com_name'   => 'required|string',
            'status_id'   => 'required|integer',
        ];
    }
}
