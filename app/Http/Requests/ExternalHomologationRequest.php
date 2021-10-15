<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExternalHomologationRequest extends FormRequest
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
            'inst_subject_id' => 'required|integer|exists:tenant.institution_subjects,id',
            'subject_id'   => 'required|integer|exists:tenant.subjects,id',
            'relation_pct' => 'required|integer',
            'comments'     => 'nullable|string|max:500',
            'status_id'    => 'required|integer|exists:tenant.status,id'
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
        }
        return $rules;
    }
}
