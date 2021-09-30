<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatterMeshRequest extends FormRequest
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
            'matter_id' => 'required|integer|exists:tenant.matters,id',
            'mesh_id'   => 'required|integer|exists:tenant.meshs,id',
            'simbology_id'      => 'integer|exists:tenant.simbologies,id',
            'can_homologate'    => 'required|boolean',
            'min_note'          => 'required|numeric',
            'min_calification'  => 'required|numeric',
            'max_calification'  => 'required|numeric',
            'num_fouls'         => 'required|integer',
            'matter_rename'     => 'nullable|string',
            'group'             => 'nullable|integer',
            'calification_models_id' => 'required|integer|exists:tenant.calification_models,id',
            'status_id'         => 'required|integer|exists:tenant.status,id'
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['matter_id'] = [
                'required',
                'integer',
                'exists:tenant.matters,id',
                'unique:tenant.matter_mesh,matter_id,' . $this->route('mattermesh')->id
            ];
        }

        return $rules;
    }
}
