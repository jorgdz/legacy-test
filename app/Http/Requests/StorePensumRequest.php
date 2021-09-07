<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePensumRequest extends FormRequest
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
            'pen_name' => 'required|unique:tenant.pensums,pen_name',
            'pen_acronym' => 'required|string|between:2,3',
            'anio' => 'required',
            'status_id' => 'required|integer|exists:tenant.status,id'
        ];
    }
}
