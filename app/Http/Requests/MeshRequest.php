<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MeshRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'mes_name'     => 'required|max:255|unique:tenant.meshs,mes_name',
                    'mes_res_cas'  => 'nullable|string|max:255',
                    'mes_res_ocas' => 'nullable|string|max:255',
                    'mes_cod_career'    => 'nullable|string|max:255',
                    'mes_title'         => 'nullable|string|max:255',
                    'mes_itinerary'     => 'nullable|string|max:255',
                    'mes_modality'      => 'nullable|string|max:255',
                    'mes_number_matter' => 'nullable|integer|max:255',
                    'mes_number_period' => 'nullable|integer|max:255',
                    'mes_creation_date' => 'nullable|date|max:255',
                    'mes_type_calification' => 'nullable|in:Horas,Creditos',
                    'mes_acronym'   => 'nullable|max:3',
                    'level_edu_id'  => 'required|integer|exists:tenant.education_levels,id',
                    'anio'          => 'required|integer',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                ];
                break;
            case 'PUT':
                return [
                    'mes_name' => 'required|max:255|unique:tenant.meshs,mes_name,' . $this->mesh->id,
                    'mes_res_cas'  => 'nullable|string|max:255',
                    'mes_res_ocas' => 'nullable|string|max:255',
                    'mes_cod_career'    => 'nullable|string|max:255',
                    'mes_title'         => 'nullable|string|max:255',
                    'mes_itinerary'     => 'nullable|string|max:255',
                    'mes_modality'      => 'nullable|string|max:255',
                    'mes_number_matter' => 'nullable|integer|max:255',
                    'mes_number_period' => 'nullable|integer|max:255',
                    'mes_creation_date' => 'nullable|date|max:255',
                    'mes_type_calification' => 'nullable|in:Horas,Creditos',
                    'mes_acronym'   => 'nullable|max:3',
                    'level_edu_id'  => 'nullable|integer|exists:tenant.education_levels,id',
                    'anio'          => 'nullable|integer',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                ];
                break;

            case 'PATCH':
                return [
                    'mes_name' => 'required|max:255|unique:tenant.meshs,mes_name,' . $this->mesh->id,
                    'mes_res_cas'  => 'nullable|string|max:255',
                    'mes_res_ocas' => 'nullable|string|max:255',
                    'mes_cod_career'    => 'nullable|string|max:255',
                    'mes_title'         => 'nullable|string|max:255',
                    'mes_itinerary'     => 'nullable|string|max:255',
                    'mes_modality'      => 'nullable|string|max:255',
                    'mes_number_matter' => 'nullable|integer|max:255',
                    'mes_number_period' => 'nullable|integer|max:255',
                    'mes_creation_date' => 'nullable|date|max:255',
                    'mes_type_calification' => 'nullable|in:Horas,Creditos',
                    'mes_acronym'   => 'nullable|max:3',
                    'level_edu_id'  => 'nullable|integer|exists:tenant.education_levels,id',
                    'anio'          => 'nullable|integer',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                ];
                break;
        }
    }
}
