<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
        $stage = $this->route()->parameter('student');
        return [
            //student
            'stud_observation' => 'string',
            'campus_id' => 'required|integer|exists:tenant.campus,id',
            'modalidad_id' => 'required|integer|exists:tenant.modalities,id',
            'jornada_id' => 'required|integer|exists:tenant.type_daytrip,id',
            'status_id' => 'required|integer|exists:tenant.status,id'
        ];
    }
}
