<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeApplicationRequest extends FormRequest
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
        $rules = [
            "typ_app_name"          => "required|string|unique:tenant.type_applications,typ_app_name",
            "typ_app_description"   => "nullable|string",
            "typ_app_acronym"       => "nullable|string|max:4|unique:tenant.type_applications,typ_app_acronym",
            "parent_id"             => "nullable||integer|exists:tenant.type_applications,id",
            "status_id"             => "required|integer|exists:tenant.status,id",
        ];
        
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['typ_app_name'] = [
                'nullable',
                'string',
                'unique:tenant.type_applications,typ_app_name,' . $this->typeapplication->id
            ];
            $rules['typ_app_acronym'] = [
                'nullable',
                'string',
                'max:4',
                'unique:tenant.type_applications,typ_app_acronym,' . $this->typeapplication->id
            ];
        }

        return $rules;
    }
}
