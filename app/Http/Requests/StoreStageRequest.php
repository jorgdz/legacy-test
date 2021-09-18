<?php

namespace App\Http\Requests;

use App\Models\Stage;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreStageRequest extends FormRequest
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
        return  [
            'stg_name' => 'required|string|unique:tenant.stages,stg_name|max:255',
            'stg_acronym' => 'required|string|unique:tenant.stages,stg_acronym|between:2,4',
            'status_id' => 'required|integer|exists:tenant.status,id',
        ];

    }
}
