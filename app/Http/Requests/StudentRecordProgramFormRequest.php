<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\StudentRecordProgram;

class StudentRecordProgramFormRequest extends FormRequest
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




        /**
         * Validacion para los tipos de archivos permitidos
         */
        Validator::extend('validationUnique', function ($attribute, $value, $parameters, $validator) {



            $studentRecordId = $this->student_record_id;
            $typeStudentProgramId = $this->type_student_program_id;

            $collectStdRecPro = collect(
                StudentRecordProgram::get()->all()
            );


            $collectStdRecPro = collect(
                StudentRecordProgram::where("student_record_id", "=", $studentRecordId)->get()->all()
            );

 

            if ( ($collectStdRecPro->contains('type_student_program_id', $typeStudentProgramId)) ) {
                $validator->addReplacer('validationUnique',  function ($message, $attribute, $rule, $parameters){
                  
                    return str_replace(':attribute', '', __('student_record_id ya tiene un type_student_program_id asigando'));
                });
                //dd('student_record_id ya tiene un type_student_program_id asigando '); messages.file-extensions-allowed'
                return false;
            }

            return true;
        

        });

 
        switch ($this->method()) {
            case 'POST':
                return [
                    'student_record_id' => 'required|integer|exists:tenant.student_records,id',//|validationUnique',
                    'type_student_program_id' => 'required|integer|exists:tenant.type_student_programs,id',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                ];
                break;
            case 'PUT':
                return [
                   
                    'student_record_id' => 'required|integer|exists:tenant.student_records,id',
                    'type_student_program_id' => 'required|integer|exists:tenant.type_student_programs,id',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                ];
                break;

            case 'PATCH':
                return [
                    'student_record_id' => 'required|integer|exists:tenant.student_records,id',
                    'type_student_program_id' => 'required|integer|exists:tenant.type_student_programs,id',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                ];
                break;

                // default:
                //     $this->reglas();

        }
    }
}
