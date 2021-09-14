<?php

namespace App\Http\Requests;

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
            'pers_identification'  => 'required|string|unique:tenant.persons,pers_identification',
            'pers_firstname'       => 'required|string',
            'pers_secondname'      => 'required|string',
            'pers_first_lastname'  => 'required|string',
            'pers_second_lastname' => 'required|string',
            'pers_gender'     => 'required|string',
            'pers_date_birth' => 'required|date',
            'pers_direction'  => 'required|string',
            /* 'pers_phone_home' => 'required|string',
            'pers_cell' => 'required|string',
            'pers_num_child'  => 'required|integer',
            'pers_profession'   => 'required|string', */
            'type_religion_id'  => 'required|integer|exists:tenant.type_religions,id',
            'status_marital_id' => 'required|integer|exists:tenant.status_marital,id',
            'city_id'           => 'required|integer|exists:tenant.cities,id',
            'current_city_id'   => 'required|integer|exists:tenant.cities,id',
            'sector_id'         => 'required|integer|exists:tenant.sectors,id',
            'ethnic_id'         => 'required|integer|exists:tenant.ethnics,id',
            'type_identification_id' => 'required|integer|exists:tenant.type_identifications,id',
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['pers_identification'] = [
                'unique:tenant.persons,pers_identification,' . $this->person->id
            ];
        }

        return $rules;
    }
}
