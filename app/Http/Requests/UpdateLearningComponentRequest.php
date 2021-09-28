<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateLearningComponentRequest extends FormRequest
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
            'mesh_id'      =>  'required|integer|exists:tenant.meshs,id|'.
                                Rule::unique('learning_components')->where('mesh_id', $this->mesh_id)->where('component_id', $this->component_id)->whereNull('deleted_at')->ignore($this->learningcomponent->id, 'id'),
            'component_id' => 'required|integer|exists:tenant.components,id',
            'status_id'    => 'required|integer',
        ];

        return $rules;
    }
}
