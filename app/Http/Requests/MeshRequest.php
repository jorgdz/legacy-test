<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeshRequest extends FormRequest
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
            'pensum_id' => 'required|integer',
            'level_edu_id' => 'required|integer',
            'status_id' => 'required|integer'
        ];
    }
}
