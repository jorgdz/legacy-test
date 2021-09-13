<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRecordRequest extends FormRequest
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
            'student_id' => 'required|integer|exists:tenant.students,id',
            'education_level_id' => 'required|integer|exists:tenant.education_levels,id',
            'pensum_id' => 'required|integer|exists:tenant.pensums,id',
            'type_student_id' => 'required|integer|exists:tenant.type_students,id',
            'period_id' => 'required|integer|exists:tenant.periods,id',
            'status_id' => 'required|integer|exists:tenant.status,id',
        ];
    }
}
