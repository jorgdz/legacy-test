<?php

namespace App\Http\Requests;

use App\Rules\RuleValidationTypeIdentification;
use App\Rules\ValidateCiRule;
use App\Rules\ValidateRucRule;
use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
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
            'pers_identification'  => ['nullable'],
            'pers_firstname'       => 'required|string',
            'pers_secondname'      => 'required|string',
            'pers_first_lastname'  => 'required|string',
            'pers_second_lastname' => 'required|string',
            'pers_gender'     => 'required|string',
            'pers_date_birth' => 'required|date',//defautl
            'pers_direction'  => 'required|string',
            'pers_phone_home' => 'nullable|string|max:255',
            'pers_cell' => 'nullable|string|max:255',
            'pers_num_child'  => 'integer',
            'pers_profession'   => 'nullable|string|max:255',
            'pers_num_bedrooms'  => 'nullable|integer',
            'pers_study_reason'   => 'nullable|string',
            'pers_num_taxpayers_household'  => 'integer',
            'pers_has_vehicle'  => 'digits_between:0,1',
            'pers_nationality_keyword' => 'required|string|exists:tenant.catalogs,cat_keyword',
            'vivienda_keyword' => 'required|string|exists:tenant.catalogs,cat_keyword',
            'type_identification_keyword' => 'required|string|exists:tenant.catalogs,cat_keyword',
            'type_religion_keyword'  => 'required|string|exists:tenant.catalogs,cat_keyword',
            'status_marital_keyword' => 'required|string|exists:tenant.catalogs,cat_keyword',
            'city_keyword'           => 'required|string|exists:tenant.catalogs,cat_keyword',
            'current_city_keyword'   => 'required|string|exists:tenant.catalogs,cat_keyword',
            'sector_keyword'         => 'required|string|exists:tenant.catalogs,cat_keyword',
            'ethnic_keyword'         => 'required|string|exists:tenant.catalogs,cat_keyword',
            //'pers_disability_identification' => 'nullable|unique:tenant.persons,pers_disability_identification|required_if:pers_has_disability,true|required_if:pers_has_disability,1',
            'pers_disability_identification' => 'nullable|required_if:pers_has_disability,true|required_if:pers_has_disability,1',
            'pers_disability_percent' => 'nullable|integer|required_if:pers_has_disability,true|required_if:pers_has_disability,1',
        ];

        $typeIdentification = $this->request->get('type_identification_keyword');
        $persIdentification = $this->request->get('pers_identification');

        if(in_array($this->method(), ['POST'])) {
            switch($typeIdentification) {
                case $typeIdentification == 'cedula' || $typeIdentification == 'dni':
                    if($persIdentification==null) {
                        $rules['pers_identification'] = [
                            'required', new ValidateCiRule(""),
                        ];
                    } else {
                        $rules['pers_identification'] = [
                            'string', new ValidateCiRule($this->request->get('pers_identification'))
                        ];
                        $rules['pers_identification'] = [
                            'unique:tenant.persons,pers_identification', new ValidateCiRule($persIdentification)
                        ];
                    }
                    break;
                case $typeIdentification == 'ruc':
                    if($persIdentification==null) {
                        $rules['pers_identification'] = [
                            'required', new ValidateRucRule(""),
                        ];
                    } else {
                        $rules['pers_identification'] = [
                            'string', new ValidateRucRule($this->request->get('pers_identification'))
                        ];
                        $rules['pers_identification'] = [
                            'unique:tenant.persons,pers_identification', new ValidateCiRule($persIdentification)
                        ];
                    }
            }
        }


        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            /* $rules['pers_disability_identification'] = [
                'unique:tenant.persons,pers_disability_identification,' . $this->person->id
            ]; */

            switch($typeIdentification) {
                case $typeIdentification == 'cedula' || $typeIdentification == 'dni':
                    if($persIdentification==null) {
                        $rules['pers_identification'] = [
                            'required', new ValidateCiRule(""),
                        ];
                    } else {
                        $rules['pers_identification'] = [
                            'string', new ValidateCiRule($this->request->get('pers_identification'))
                        ];
                        $rules['pers_identification'] = [
                            'unique:tenant.persons,pers_identification,' . $this->person->id
                        ];
                    }
                    break;
                case $typeIdentification == 'ruc':
                    if($persIdentification==null) {
                        $rules['pers_identification'] = [
                            'required', new ValidateRucRule(""),
                        ];
                    } else {
                        $rules['pers_identification'] = [
                            'string', new ValidateRucRule($this->request->get('pers_identification'))
                        ];
                        $rules['pers_identification'] = [
                            'unique:tenant.persons,pers_identification,' . $this->person->id
                        ];
                    }
            }
        }

        return $rules;
    }
}
