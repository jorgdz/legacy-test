<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//class StoreMatterRequest extends FormRequest
class StoreSubjectRequest extends FormRequest
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
    public function rules() {
        $rules = [
            'mat_name'  => 'required|string|unique:tenant.subjects,mat_name',
            'cod_matter_migration' => 'nullable|string',
            'cod_old_migration'    => 'nullable|string',
            'mat_acronym'   => 'required|string|max:3|unique:tenant.subjects,mat_name',
            'mat_translate' => 'nullable|string',
            'mat_payment_type' => 'in:creditos,horas,Ninguno',
            'type_matter_id'     => 'required|integer|exists:tenant.type_subjects,id',
            'education_level_id' => 'required|integer|exists:tenant.education_levels,id',
            'area_id'   => 'required|integer|exists:tenant.areas,id',
            'status_id' => 'required|integer|exists:tenant.status,id'
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['mat_name'] = [
                'required',
                'string',
                'unique:tenant.subjects,mat_name,' . $this->subject->id
            ];
        }
        return $rules;
    }
}
