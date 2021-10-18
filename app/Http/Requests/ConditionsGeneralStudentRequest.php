<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConditionsGeneralStudentRequest extends FormRequest
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
            'student_record_id'     => 'required|integer|exists:tenant.student_records,id',
            'curriculum_id'         => 'required|integer|exists:tenant.curriculums,id',
            'period_id'             => 'required|integer|exists:tenant.periods,id',
            'status_id'             => 'required|integer|exists:tenant.status,id',     
        ];

        return $rules;
    }
}
