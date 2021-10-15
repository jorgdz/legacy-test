<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaGroupRequest extends FormRequest
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
            'arg_name'        => 'required|string|unique:tenant.group_areas,arg_name',
            'arg_description' => 'nullable|string',
            'arg_keywords'        => 'required|string|unique:tenant.group_areas,arg_keywords',
            'status_id'      => 'required|integer|exists:tenant.status,id',
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['arg_name'] = [
                'nullable',
                'string',
                'unique:tenant.group_areas,arg_name,' . $this->areaGroup->id
            ];
            
            $rules['arg_keywords'] = [
                'nullable',
                'string',
                'unique:tenant.group_areas,arg_keywords,' . $this->areaGroup->id
            ];
        }

        return $rules;
    }
}
