<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeSubjectRequest extends FormRequest
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
            'tm_name' => 'required|string|unique:tenant.type_subjects,tm_name',
            'tm_acronym' => 'required|string|between:2,3',
            'tm_cobro' => 'required|boolean',
            'tm_matter_count' => 'required|boolean',
            'status_id' => 'required|integer|exists:tenant.status,id'
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['tm_name'] = [
                'required',
                'string',
                'unique:tenant.type_subjects,tm_name,' . $this->typesubject->id
            ];
        }
        return $rules;
    }
}
