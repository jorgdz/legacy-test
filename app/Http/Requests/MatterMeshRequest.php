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
            'matter_id' => 'required|integer',
            'mesh_id' => 'required|integer',
            'calification_type' => 'required',
            'min_calification' => 'required',
            'num_fouls' => 'required',
            'matter_rename' => 'required'
        ];
    }
}
