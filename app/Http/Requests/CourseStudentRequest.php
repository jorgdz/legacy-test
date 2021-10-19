<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseStudentRequest extends FormRequest
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
            'course_id'             => 'required|integer|exists:tenant.courses,id',
            'student_record_id'     => 'required|integer|exists:tenant.student_records,id',
            'final_note'            => 'nullable|numeric',
            'observation'           => 'nullable|string',
            'num_fouls'             => 'nullable|integer',
            'subject_status_id'     => 'required|integer|exists:tenant.subject_status,id',
            'subject_id'            => 'required|integer|exists:tenant.subjects,id',
            'period_id'             => 'required|integer|exists:tenant.periods,id',
            'subject_curriculum_id' => 'required|integer|exists:tenant.periods,id',
            'curriculum_id'         => 'required|integer|exists:tenant.periods,id',
            'approval_status'       => 'required|integer|exists:tenant.status,id',
            'approval_reason_id'    => 'required|integer|exists:tenant.catalogs,id',
            'status_id'             => 'required|integer|exists:tenant.status,id',
            'subject_curriculum_id' => 'required|integer|exists:tenant.subject_curriculum,id',
            'curriculum_id'         => 'required|integer|exists:tenant.curriculums,id',
        ];

        return $rules;
    }
}
