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
        return [
            'matter_id' => 'required|integer|exists:tenant.matters,id',
            'mesh_id' => 'required|integer|exists:tenant.meshs,id',
            'simbology_id' => 'integer|exists:tenant.simbologies,id',
            'calification_type' => 'required',
            'min_calification' => 'required',
            'max_calification' => 'required',
            'num_fouls' => 'required',
            'group' => 'required',
            'matter_rename' => 'required'
        ];
    }
}
