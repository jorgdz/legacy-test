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
            'type_identification_id' => 'required|integer|exists:tenant.catalogs,id',
            'pers_identification' => 'required|unique:tenant.persons,pers_identification',
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
            'pers_nationality'   => 'required|integer|exists:tenant.catalogs,id',
            'pers_is_provider'  => 'nullable|digits_between:0,1',
            'pers_has_disability'  => 'nullable|digits_between:0,1',
            'vivienda_id'  => 'required|integer|exists:tenant.catalogs,id',
            'type_religion_id'  => 'required|integer|exists:tenant.catalogs,id',
            'status_marital_id' => 'required|integer|exists:tenant.catalogs,id',
            'city_id'           => 'required|integer|exists:tenant.catalogs,id',
            'current_city_id'   => 'required|integer|exists:tenant.catalogs,id',
            'sector_id'         => 'required|integer|exists:tenant.catalogs,id',
            'ethnic_id'         => 'required|integer|exists:tenant.catalogs,id',
            //user
            'email'       => 'required|email|unique:tenant.users,email',
            //relatives
            'type_identification_id_relatives_person' => 'required_if:status_marital_id,==,35|nullable|integer|exists:tenant.catalogs,id',
            'pers_identification_relatives_person' => 'required_if:status_marital_id,==,35|nullable|unique:tenant.persons,pers_identification',
            'pers_firstname_relatives_person'       => 'required_if:status_marital_id,==,35|nullable|string|max:255',
            'pers_secondname_relatives_person'      => 'required_if:status_marital_id,==,35|nullable|string|max:255',
            'pers_first_lastname_relatives_person'  => 'required_if:status_marital_id,==,35|nullable|string|max:255',
            'pers_second_lastname_relatives_person' => 'required_if:status_marital_id,==,35|nullable|string|max:255',
            'pers_relatives_person_desc' => 'required_if:status_marital_id,==,35|nullable|string|max:255',
            //disabilities
            'pers_disability_identification' => 'required_if:pers_has_disability,==,1|nullable|integer',
            'pers_disability_percent'  => 'required_if:pers_has_disability,==,1|nullable|integer',
            'pers_disabilities'  => 'required_if:pers_has_disability,==,1|nullable|array',
            'pers_disabilities.*'  => 'required_if:pers_has_disability,==,1|nullable|integer|exists:tenant.type_disabilities,id',

            //Collaborator
            'coll_email'       => 'required|email|unique:tenant.users,email',
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

        $typeIdentification = intval($this->request->get('type_identification_id'));
        $persIdentification = $this->request->get('pers_identification');

        switch($typeIdentification) {
            case $typeIdentification == 66 || $typeIdentification == 68:
                if($persIdentification==null) {
                    $rules['pers_identification'] = [
                        'required', new ValidateCiRule(""),
                    ];
                } else {
                    $rules['pers_identification'] = [
                        'string', new ValidateCiRule($persIdentification)
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
                        'string', new ValidateRucRule($persIdentification)
                    ];
                }
        }

        return $rules;
    }
}
