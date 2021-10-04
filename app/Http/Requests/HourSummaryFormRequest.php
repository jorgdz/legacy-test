<?php

namespace App\Http\Requests;

use App\Models\Collaborator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class HourSummaryFormRequest extends FormRequest
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
        Validator::extend('validateActiveCollaborator', function ($attribute, $value, $parameters, $validator) {


            $collaborator = Collaborator::where('id', $value)->where('status_id', 1)->count();
            if ($collaborator == 0) {
                //si el usuario no esta activo
                $validator->addReplacer('validateActiveCollaborator',  function ($message, $attribute, $rule, $parameters)  {
                    return str_replace('','', __('messages.collaborator-is-inactive'));
                });

                return false;
            }
            //esta activo
            return true;
           
        });


        $rules = [
            'collaborator_id'   => 'required|integer|exists:tenant.collaborators,id',
            'hs_classes'   => 'required|integer',
            'hs_classes_examns_preparation'   => 'required|integer',
            'hs_bonding'   => 'required|integer',
            'hs_tutoring'   => 'required|integer',
            'hs_research'   => 'required|integer',
            //'hs_total'   => 'required|integer',
            'hs_academic_management'   => 'required|integer',
            'collaborator_hour_id'   => 'required|integer|exists:tenant.collaborator_hours,id',
            'status_id'   => 'required|integer|exists:tenant.status,id',
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $rules['collaborator_id'] = [
                'required',
                'integer',
                'validateActiveCollaborator'
            ];
        }

        return $rules;
    }
}
