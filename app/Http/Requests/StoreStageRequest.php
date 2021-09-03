<?php

namespace App\Http\Requests;

use App\Models\Stage;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreStageRequest extends FormRequest
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
            'stg_name' => 'required|string|unique:tenant.stages,stg_name|max:255',
            'stg_description' => 'required|string|unique:tenant.stages,stg_description|max:255',
            'status_id' => 'required|integer|exists:tenant.status,id',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $stage = $this->route()->parameter('stage');
            $rules['stg_name'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('stages')->ignore($stage),
            ];
            $rules['stg_description'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('stages')->ignore($stage),
            ];
        }

        return $rules;

    }
}
