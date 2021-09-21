<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EconomicGroupRequest extends FormRequest
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
    public function rules() {
        $rules = [
            'eco_gro_name' => 'unique:tenant.economic_groups,eco_gro_name',
            'status_id' => 'required|integer|exists:tenant.status,id'
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['eco_gro_name'] = [
                'required',
                'string',
                'unique:tenant.economic_groups,eco_gro_name,'. $this->ecogroup->id
            ];
        }
        return $rules;
    }
}
