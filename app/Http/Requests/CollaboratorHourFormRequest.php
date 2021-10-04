<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CollaboratorHourFormRequest extends FormRequest
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
            'period_id'   => 'required|integer|exists:tenant.periods,id',
            'education_level_id'   => 'required|integer|exists:tenant.education_levels,id',
            'ch_working_time'    => 'required|string|max:3|'.Rule::in(['TC', 'MT','TP']),//|unique:tenant.departments,dep_name',
            'status_id'   => 'required|integer|exists:tenant.status,id',
        ];
        /* if (in_array($this->method(), ['PUT', 'PATCH'])) {
   
            $rules['dep_name'] = [
                'nullable',
                'string',
                'unique:tenant.departments,dep_name,' . $this->department->id
            ];
           
        } */

        return $rules;
    }
}
