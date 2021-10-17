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
            'group_nivelation_id' => 'required|exists:tenant.group_areas,id',
            'subject_id' => 'integer|exists:tenant.subjects,id',
            'status_id'   => "integer|exists:tenant.status,id",
        ];
    }
}
