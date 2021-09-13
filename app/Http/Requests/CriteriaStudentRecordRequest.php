<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriteriaStudentRecordRequest extends FormRequest
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
            'qualification' => 'required',
            'type_criteria_id' => 'required|integer|exists:tenant.type_criterias,id',
            'student_record_id' => 'required|integer|exists:tenant.student_records,id'
        ];
    }
}
