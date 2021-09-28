<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDetailMatterMeshRequest extends FormRequest
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
            'matter_mesh_id' => 'required|integer|exists:tenant.matter_mesh,id|'.
                                 Rule::unique('detail_matter_meshes')->where('matter_mesh_id', $this->matter_mesh_id)->where('components_id', $this->components_id)->whereNull('deleted_at')->ignore($this->detailmattermesh->id, 'id'),
            'components_id'  => 'required|integer|exists:tenant.components,id',
            'dem_workload'   => 'required|integer',
            'status_id'      => 'required|integer',
        ];

        return $rules;
    }
}
