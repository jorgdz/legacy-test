<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeStudentProgramFormRequest extends FormRequest
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

        switch ($this->method()) {
            case 'POST':
                return [
                    'typ_stu_pro_name' => 'required|max:255|unique:tenant.type_student_programs,typ_stu_pro_name',
                    'typ_stu_pro_acronym' => 'required|max:10|unique:tenant.type_student_programs,typ_stu_pro_acronym',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                ];
                break;
            case 'PUT':
                return [
                    'typ_stu_pro_name' => 'required|max:255|unique:tenant.type_student_programs,typ_stu_pro_name,'. $this->typeStudentProgram->id,
                    'typ_stu_pro_acronym' => 'required|max:10|unique:tenant.type_student_programs,typ_stu_pro_acronym,'. $this->typeStudentProgram->id,
                    'status_id' => 'required|integer|exists:tenant.status,id'
                    //'edu_name' => 'required|max:255|unique:tenant.meshs,mes_name,' . $this->mesh->id,
                ];
                break;

            case 'PATCH':
                return [
                    'typ_stu_pro_name' => 'required|max:255|unique:tenant.type_student_programs,typ_stu_pro_name,'. $this->typeStudentProgram->typ_stu_pro_name,
                    'typ_stu_pro_acronym' => 'required|max:10|unique:tenant.type_student_programs,typ_stu_pro_acronym,'. $this->typeStudentProgram->typ_stu_pro_acronym,
                    'status_id' => 'required|integer|exists:tenant.status,id'
                    //'edu_name' => 'required|max:255|unique:tenant.meshs,mes_name,' . $this->mesh->id,
                ];
                break;

                // default:
                //     $this->reglas();

        }
    }
}
