<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class UpdateLogoCurrentTenantRequest extends FormRequest
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
         * Validacion para los tipos de logos
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



        /**
         * Validacion para subir un solo archivo
         */
        Validator::extend('oneFile', function ($attribute, $value, $parameters, $validator) {


            if (count($value) > 1) {
                $validator->addReplacer('oneFile',  function ($message, $attribute, $rule, $parameters) {
                    return str_replace(':atribute',  '' , __('messages.number-of-allowed-files'));
                });

                return false;
            }

            return true;

        });

        return [
            'files' => 'required|array|extensionFile|oneFile',
            //'period'   => 'required|integer',
            'type_document'   => 'required|integer|exists:landlord.type_documents,id',
        ];
    }
}
