<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CurriculumRequest extends FormRequest
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
            'mes_name'     => 'required|max:255|unique:tenant.curriculums,mes_name',
            'mes_res_cas'  => 'nullable|string|max:255',
            'mes_res_ocas' => 'nullable|string|max:255',
            'mes_cod_career'    => 'nullable|string|max:255',
            'mes_title'         => 'nullable|string|max:255',
            'mes_itinerary'     => 'nullable|string|max:255',
            'mes_number_period' => 'nullable|integer',
            'mes_quantity_external_matter_homologate' => 'nullable|integer',
            'mes_quantity_internal_matter_homologate' => 'nullable|integer',
            'mes_creation_date' => 'nullable|date',
            'mes_acronym'       => 'nullable|string|max:3',
            'anio'              => 'required|integer',
            'mes_description'   => 'nullable|string',
            'mes_modality_id'   => 'required|integer|exists:tenant.catalogs,id',
            'type_calification_id' => 'required|integer|exists:tenant.type_califications,id',
            'level_edu_id'  => 'required|integer|exists:tenant.education_levels,id',
            'status_id' => 'required|integer|exists:tenant.status,id'
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['mes_name'] = [
                'required',
                'string',
                'unique:tenant.curriculums,mes_name,' . $this->curriculum->id
            ];
        }
        return $rules;
    }
}
