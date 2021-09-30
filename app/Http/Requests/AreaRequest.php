<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequest extends FormRequest
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
            'ar_name'        => 'required|string|unique:tenant.areas,ar_name',
            'ar_description' => 'nullable|string',
            'status_id'      => 'required|integer|exists:tenant.status,id',
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['ar_name'] = [
                'nullable',
                'string',
                'unique:tenant.areas,ar_name,' . $this->area->id
            ];
        }

        return $rules;
    }
}
