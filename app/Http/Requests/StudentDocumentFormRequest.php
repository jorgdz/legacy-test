<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class StudentDocumentFormRequest extends FormRequest
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
        Validator::extend('extensionFile', function ($attribute, $value, $parameters,$validator) {

            $extensionPermitidas = ['jpeg', 'jpg', 'png', 'pdf' ];
            $extSubidas = [];
           

            $collection = collect($extensionPermitidas);

            foreach($value as $file)
            {
                array_push($extSubidas,$file->getClientOriginalExtension());
            }

            foreach($extSubidas as $ext)
            {
                if (!$collection->contains($ext)) {
                
                    $validator->addReplacer('extensionFile',  function ($message, $attribute, $rule, $parameters) use ($extensionPermitidas) {
                        return str_replace(':file', implode(", ", $extensionPermitidas), __('messages.file-extensions-allowed'));
                    });
                     
                    return false;
                }
            }
     
            return true;

          
        });

       
   
        switch ($this->method()) {
            case 'POST':
                return [
                    //'stu_doc_url' => 'required|max:255',
                    'stu_doc_name_file' => 'array|required|extensionFile',//|max:2048',
                    'type_document_id' => 'required|integer|exists:tenant.type_document,id',
                    'students_id' => 'required|integer|exists:tenant.students,id',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                ];
                break;
            case 'PUT':
                return [
                    //'stu_doc_url' => 'required|max:255',
                   // 'stu_doc_name_file' => 'required|max:255',
                    'type_document_id' => 'required|integer|exists:tenant.type_document,id',
                    'students_id' => 'required|integer|exists:tenant.students,id',
                    'status_id' => 'required|integer|exists:tenant.status,id'

                    // 'mes_name' => 'required|max:255|unique:tenant.meshs,mes_name,' . $this->mesh->id,//
                ];
                break;

            case 'PATCH':
                return [
                   // 'stu_doc_url' => 'required|max:255',
                    //'stu_doc_name_file' => 'required|max:255',
                    'type_document_id' => 'required|integer|exists:tenant.type_document,id',
                    'students_id' => 'required|integer|exists:tenant.students,id',
                    'status_id' => 'required|integer|exists:tenant.status,id'

                ];
                break;

                // default:
                //     $this->reglas();

        }
    }


    public function messages()
    {
        $messages = [];

        return $messages;
    }
}
