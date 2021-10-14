<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationLevelSubjectRequest extends FormRequest
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
        return [
            'group_nivelation_keyword' => 'required|string|exists:tenant.catalogs,cat_keyword',
            'education_level_id' => 'integer|exists:tenant.education_levels,id',
            'subject_id' => 'integer|exists:tenant.subjects,id'
        ];
    }
}
