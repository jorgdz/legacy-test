<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeparmentFormRequest extends FormRequest
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
            'dep_name'    => 'required|string|unique:tenant.departments,dep_name',
            'dep_description'    => 'nullable|string',
            'parent_id'   => 'nullable|integer|exists:tenant.departments,id',
            'status_id'   => 'required|integer|exists:tenant.status,id',
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
   
            $rules['dep_name'] = [
                'nullable',
                'string',
                'unique:tenant.departments,dep_name,' . $this->department->id
            ];
           
        }

        return $rules;
    }
}
