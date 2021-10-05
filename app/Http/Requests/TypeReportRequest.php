<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeReportRequest extends FormRequest
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
            'name'      => 'required|string',
            'acronym'   => 'required|string|max:5|unique:tenant.type_reports,acronym',
            'description' => 'nullable|string',
            'rrhh' => 'required|boolean',
            'status_id' => 'required|integer|exists:tenant.status,id',
            'signatures' => 'nullable|array',
        ];

        if ($this->signatures) {
            $aux = [
                'signatures.*.sign_position'   => 'required|string',
                'signatures.*.sign_person'     => 'required|string',
                'signatures.*.sign_reference'  => 'required|string',
                'signatures.*.status_id'  => 'required|integer|exists:tenant.status,id',
            ];
            if ($this->rrhh) {
                $aux = [
                    'signatures.*.collaborator_id' => 'required|integer|exists:tenant.collaborators,id',
                    'signatures.*.position_id'     => 'required|integer|exists:tenant.positions,id',
                    'signatures.*.sign_reference'  => 'required|string',
                    'signatures.*.status_id'  => 'required|integer|exists:tenant.status,id',
                ];
            }
            $rules += $aux;
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            unset($rules["signatures"]);
            $rules['acronym'] = [
                'nullable',
                'string',
                'max:5',
                'unique:tenant.type_reports,acronym,' . $this->typeReport->id
            ];
        }

        return $rules;
    }
}
