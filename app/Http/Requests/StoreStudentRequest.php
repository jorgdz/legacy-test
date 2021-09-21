<?php

namespace App\Http\Requests;

use App\Rules\ValidateCiRule;
use App\Rules\ValidateRucRule;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
        $rules = [
            //person
            'pers_identification' => 'nullable|unique:tenant.persons,pers_identification',
            'pers_firstname'       => 'required|string|max:255',
            'pers_secondname'      => 'required|string|max:255',
            'pers_first_lastname'  => 'required|string|max:255',
            'pers_second_lastname' => 'required|string|max:255',
            'pers_gender'     => 'required|string|max:255',
            'pers_date_birth' => 'required|date',
            'pers_direction'  => 'required|string|max:255',
            'pers_phone_home' => 'string|max:255',
            'pers_cell' => 'string|max:255',
            'pers_num_child'  => 'integer',
            'pers_profession'   => 'string|max:255',
            'pers_num_bedrooms'  => 'integer',
            'pers_study_reason'   => 'string',
            'pers_num_taxpayers_household'  => 'integer',
            'pers_has_vehicle'  => 'digits_between:0,1',
            'vivienda_id'  => 'required|integer|exists:tenant.catalogs,id',
            'type_religion_id'  => 'required|integer|exists:tenant.type_religions,id',
            'status_marital_id' => 'required|integer|exists:tenant.status_marital,id',
            'city_id'           => 'required|integer|exists:tenant.cities,id',
            'current_city_id'   => 'required|integer|exists:tenant.cities,id',
            'sector_id'         => 'required|integer|exists:tenant.sectors,id',
            'ethnic_id'         => 'required|integer|exists:tenant.ethnics,id',
            'type_identification_id' => 'required|integer|exists:tenant.type_identifications,id',
            //user
            'email'       => 'required|email|unique:tenant.users,email',
            //student
            'campus_id' => 'required|integer|exists:tenant.campus,id',
            'modalidad_id' => 'required|integer|exists:tenant.modalities,id',
            'jornada_id' => 'required|integer|exists:tenant.type_daytrip,id'
        ];

        $typeIdentification = intval($this->request->get('type_identification_id'));
        $persIdentification = $this->request->get('pers_identification');

        if(in_array($this->method(), ['POST'])) {
            switch($typeIdentification) {
                case $typeIdentification == 1 || $typeIdentification == 3:
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
                case $typeIdentification == 2:
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

            switch($typeIdentification) {
                case $typeIdentification == 1 || $typeIdentification == 3:
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
                case $typeIdentification == 2:
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
