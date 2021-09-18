<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStageRequest extends FormRequest
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
        $stage = $this->route()->parameter('stage');
        return  [
            'stg_name' => 'required|string|unique:tenant.stages,stg_name,'.$stage->id.'|max:255',
            'stg_acronym' => 'required|string|unique:tenant.stages,stg_acronym,'.$stage->id.'|between:2,4',
            'status_id' => 'required|integer|exists:tenant.status,id',
        ];
    }
}
