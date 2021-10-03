<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

//class MatterMeshRequest extends FormRequest
class UpdateClassroomEducationLevelRequest extends FormRequest
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
            'period_id' => 'required|integer|exists:tenant.periods,id',
            'education_level_id' => 'integer|exists:tenant.education_levels,id',
            'classroom_id' => 'required|integer|exists:tenant.classrooms,id',
            'status_id' => 'required|integer|exists:tenant.status,id'
        ];

        return $rules;
    }
}
