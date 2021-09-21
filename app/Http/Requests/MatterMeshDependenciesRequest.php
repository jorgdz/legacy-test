<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatterMeshDependenciesRequest extends FormRequest
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
            'matterMesh' => 'array',
            'matterMesh.*' => 'integer|exists:tenant.matter_mesh,id|distinct'
        ];
    }
}
