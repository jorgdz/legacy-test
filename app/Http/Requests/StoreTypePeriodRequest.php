<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTypePeriodRequest extends FormRequest
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
            'tp_name' => 'required|string|unique:tenant.type_periods,tp_name|max:255',
            'tp_description' => 'required|string|unique:tenant.type_periods,tp_description|max:255',
            'status_id' => 'required|integer|exists:tenant.status,id',
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $typePeriod = $this->route()->parameter('typePeriod');
            $rules['tp_name'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('type_periods')->ignore($typePeriod),
            ];
            $rules['tp_description'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('type_periods')->ignore($typePeriod),
            ];
        }
        return $rules;
    }
}
