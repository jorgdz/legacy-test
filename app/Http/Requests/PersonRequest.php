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
            'pers_identification'  => ['nullable','unique:tenant.persons,pers_identification'],
            'pers_firstname'       => 'required|string',
            'pers_secondname'      => 'required|string',
            'pers_first_lastname'  => 'required|string',
            'pers_second_lastname' => 'required|string',
            'pers_gender'     => 'required|string',
            'pers_date_birth' => 'required|date',//defautl
            'pers_direction'  => 'required|string',
            'pers_phone_home' => 'string|max:255',
            'pers_cell' => 'string|max:255',
            'pers_num_child'  => 'integer',
            'pers_profession'   => 'string|max:255',
            'pers_num_bedrooms'  => 'integer',
            'pers_study_reason'   => 'string',
            'pers_num_taxpayers_household'  => 'integer',
            'pers_has_vehicle'  => 'digits_between:0,1',
            'vivienda_id' => 'required|integer|exists:tenant.catalogs,id',
            'type_religion_id'  => 'required|integer|exists:tenant.catalogs,id',
            'status_marital_id' => 'required|integer|exists:tenant.catalogs,id',
            'city_id'           => 'required|integer|exists:tenant.catalogs,id',
            'current_city_id'   => 'required|integer|exists:tenant.catalogs,id',
            'sector_id'         => 'required|integer|exists:tenant.catalogs,id',
            'ethnic_id'         => 'required|integer|exists:tenant.catalogs,id',
            'type_identification_id' => 'required|integer|exists:tenant.catalogs,id',
            //'pers_disability_identification' => 'nullable|unique:tenant.persons,pers_disability_identification|required_if:pers_has_disability,true|required_if:pers_has_disability,1',
            'pers_disability_identification' => 'nullable|required_if:pers_has_disability,true|required_if:pers_has_disability,1',
            'pers_disability_percent' => 'nullable|integer|required_if:pers_has_disability,true|required_if:pers_has_disability,1',
        ];

        $typeIdentification = intval($this->request->get('type_identification_id'));
        $persIdentification = $this->request->get('pers_identification');

        if(in_array($this->method(), ['POST'])) {
            switch($typeIdentification) {
                case $typeIdentification == 66 || $typeIdentification == 68:
                    if($persIdentification==null) {
                        $rules['pers_identification'] = [
                            'required', new ValidateCiRule(""),
                        ];
                    } else {
                        $rules['pers_identification'] = [
                            'string', new ValidateCiRule($this->request->get('pers_identification'))
                        ];
                    }
                    break;
                case $typeIdentification == 67:
                    if($persIdentification==null) {
                        $rules['pers_identification'] = [
                            'required', new ValidateRucRule(""),
                        ];
                    } else {
                        $rules['pers_identification'] = [
                            'string', new ValidateRucRule($this->request->get('pers_identification'))
                        ];
                    }
            }
        }


        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['pers_identification'] = [
                'unique:tenant.persons,pers_identification,' . $this->person->id
            ];
            /* $rules['pers_disability_identification'] = [
                'unique:tenant.persons,pers_disability_identification,' . $this->person->id
            ]; */

            switch($typeIdentification) {
                case $typeIdentification == 66 || $typeIdentification == 68:
                    if($persIdentification==null) {
                        $rules['pers_identification'] = [
                            'required', new ValidateCiRule(""),
                        ];
                    } else {
                        $rules['pers_identification'] = [
                            'string', new ValidateCiRule($this->request->get('pers_identification'))
                        ];
                    }
                    break;
                case $typeIdentification == 67:
                    if($persIdentification==null) {
                        $rules['pers_identification'] = [
                            'required', new ValidateRucRule(""),
                        ];
                    } else {
                        $rules['pers_identification'] = [
                            'string', new ValidateRucRule($this->request->get('pers_identification'))
                        ];
                    }
            }
        }

        return $rules;
    }
}
