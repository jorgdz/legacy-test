<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidateCiRule;
use Illuminate\Validation\Rule;
use App\Rules\ValidateRucRule;

class StoreCollaboratorRequest extends FormRequest
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
            'type_identification_keyword' => 'required|string|exists:tenant.catalogs,cat_keyword',

            'pers_identification' => 'required',
            'pers_firstname'       => 'required|string|max:255',
            'pers_secondname'      => 'required|string|max:255',
            'pers_first_lastname'  => 'required|string|max:255',
            'pers_second_lastname' => 'required|string|max:255',
            'pers_gender'     => 'nullable|string|max:255',
            'pers_date_birth' => 'nullable|date',
            'pers_direction'  => 'nullable|string|max:255',
            'pers_phone_home' => 'nullable|string|max:255',
            'pers_cell' => 'nullable|string|max:255',
            'pers_num_child'  => 'nullable|integer',
            'pers_profession'   => 'nullable|string|max:255',
            'pers_num_bedrooms'  => 'nullable|integer',
            'pers_study_reason'   => 'nullable|string|max:255',
            'pers_num_taxpayers_household'  => 'nullable|integer',
            'pers_has_vehicle'  => 'nullable|digits_between:0,1',
            'pers_nationality_keyword'   => 'required|string|exists:tenant.catalogs,cat_keyword',
            'pers_is_provider'  => 'nullable|digits_between:0,1',
            'pers_has_disability'  => 'nullable|digits_between:0,1',
            'vivienda_keyword'  => 'required|string|exists:tenant.catalogs,cat_keyword',
            'type_religion_keyword'  => 'required|string|exists:tenant.catalogs,cat_keyword',
            'status_marital_keyword' => 'required|string|exists:tenant.catalogs,cat_keyword',
            'city_keyword'           => 'required|string|exists:tenant.catalogs,cat_keyword',
            'current_city_keyword'   => 'required|string|exists:tenant.catalogs,cat_keyword',
            'sector_keyword'         => 'required|string|exists:tenant.catalogs,cat_keyword',
            'ethnic_keyword'         => 'required|string|exists:tenant.catalogs,cat_keyword',
            //user
            'email'       => 'required|email|unique:tenant.users,email',
            //relatives
            'type_identification_keyword_relatives_person' => 'required_if:status_marital_keyword,==,casado|nullable|string|exists:tenant.catalogs,cat_keyword',
            'type_religion_relative_keyword'  => 'required_if:status_marital_keyword,==,casado|nullable|string|exists:tenant.catalogs,cat_keyword',
            'ethnic_relative_keyword'         => 'required_if:status_marital_keyword,==,casado|nullable|string|exists:tenant.catalogs,cat_keyword',
            'pers_identification_relatives_person' => 'required_if:status_marital_keyword,==,casado|nullable|unique:tenant.persons,pers_identification',
            'pers_firstname_relatives_person'       => 'required_if:status_marital_keyword,==,casado|nullable|string|max:255',
            'pers_secondname_relatives_person'      => 'required_if:status_marital_keyword,==,casado|nullable|string|max:255',
            'pers_first_lastname_relatives_person'  => 'required_if:status_marital_keyword,==,casado|nullable|string|max:255',
            'pers_second_lastname_relatives_person' => 'required_if:status_marital_keyword,==,casado|nullable|string|max:255',
            'pers_gender_relative'     => 'required_if:status_marital_keyword,==,casado|nullable|string|max:255',
            'pers_relatives_person_desc' => 'required_if:status_marital_keyword,==,casado|nullable|string|max:255',
            //disabilities
            'pers_disability_identification' => 'required_if:pers_has_disability,==,1|nullable|integer',
            'pers_disability_percent'  => 'required_if:pers_has_disability,==,1|nullable|integer',
            'pers_disabilities'  => 'required_if:pers_has_disability,==,1|nullable|array',
            'pers_disabilities.*'  => 'required_if:pers_has_disability,==,1|nullable|integer|exists:tenant.type_disabilities,id',

            //Collaborator
            'coll_email' => 'required|email|unique:tenant.collaborators,coll_email',
            'coll_type'       => 'required|string|max:1|'.Rule::in(['D', 'A']),
            'coll_journey_description'       => 'required|string|max:3|'.Rule::in(['TC', 'MT','TP']),
            'coll_dependency'       => 'required_if:coll_journey_description,==,"MT"|nullable|digits_between:0,1',
            'coll_journey_hours'       => 'required_if:coll_journey_description,==,"TP"|nullable|integer',
            'position_company_id'       => 'required|integer|exists:tenant.positions,id',
            'coll_entering_date' => 'required|date',
            'coll_leaving_date' => 'nullable|date',
            'coll_membership_num'       => 'nullable|integer',
            'status_id' => 'integer|exists:tenant.status,id',
            //'coll_contract_num'       => 'nullable|integer',
            'coll_has_nomination'  => 'nullable|digits_between:0,1',
            'coll_nomination_entering_date' => 'nullable|date',
            'coll_nomination_leaving_date' => 'nullable|date',
            'education_level_principal_id'=>'required|integer|exists:tenant.education_levels,id',

            //Asociación de niveles de educacion para el colaborador
            'education_levels'=>'required|array',
            'education_levels.*'=>'required|integer|exists:tenant.education_levels,id',

            //Asociación de campus para el colaborador
            'campus'=>'required|array',
            'campus.*'=>'required|integer|exists:tenant.campus,id',
        ];

        $typeIdentification = $this->request->get('type_identification_keyword');
        $persIdentification = $this->request->get('pers_identification');

        switch($typeIdentification) {
            case $typeIdentification == 'cedula' || $typeIdentification == 'dni':
                if($persIdentification==null) {
                    $rules['pers_identification'] = [
                        'required', new ValidateCiRule(""),
                    ];
                } else {
                    $rules['pers_identification'] = [
                        'string', new ValidateCiRule($persIdentification),
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
                        'string', new ValidateRucRule($persIdentification)
                    ];
                }
        }
        return $rules;
    }
}
