<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMatterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'cod_mate_migration' => 'required|string',
            'cod_old_migration' => 'required|string',
            'type_matter_id' => 'required|integer|exists:tenant.type_matters,id',
            'type_calification_id' => 'required|integer|exists:tenant.type_califications,id',
            'min_note' => 'required|numeric',
            'status_id' => 'required|integer|exists:tenant.status,id'
        ];
    }
}