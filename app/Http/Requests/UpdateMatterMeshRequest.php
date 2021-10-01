<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMatterMeshRequest extends FormRequest
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
            'matter_id' => "required|integer|exists:tenant.subjects,id|unique:tenant.matter_mesh,matter_id, {$this->route('mattermesh')->id}",
            'mesh_id'   => 'required|integer|exists:tenant.curriculums,id',
            'group'     => 'nullable|integer',
            'simbology_id' => 'integer|exists:tenant.simbologies,id',
        ];
    }
}
