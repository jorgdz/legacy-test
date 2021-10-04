<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StudentPhotoRequest extends FormRequest
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
        Validator::extend('extensionFile', function ($attribute, $value, $parameters, $validator) {

            $extensionPermitidas = ['jpeg', 'jpg', 'png', 'gif', 'tiff', 'svg', 'JPEG', 'JPG', 'PNG', 'GIF', 'TIFF', 'SVG'];
            $extSubidas = [];

            $collection = collect($extensionPermitidas);

            foreach ($value as $file) {
                array_push($extSubidas, $file->getClientOriginalExtension());
            }

            foreach ($extSubidas as $ext) {
                if (!$collection->contains($ext)) {

                    $validator->addReplacer('extensionFile',  function ($message, $attribute, $rule, $parameters) use ($extensionPermitidas) {
                        return str_replace(':file', implode(", ", $extensionPermitidas), __('messages.file-extensions-allowed'));
                    });

                    return false;
                }
            }

            return true;
        });
        return [
            /* 'student_id' => 'required|integer|exists:tenant.students,id', */
            'files' => 'required|extensionFile',
            /* 'period'   => 'required|integer', */
            'type_document'   => 'required|integer|exists:landlord.type_documents,id',
        ];
    }
}
