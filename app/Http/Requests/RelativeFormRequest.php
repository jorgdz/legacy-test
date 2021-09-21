<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelativeFormRequest extends FormRequest
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
            'person_id_relative' => 'required|integer|exists:tenant.persons,id',
            'person_id_student'  => 'required|integer|exists:tenant.persons,id',
            'type_kinship_id'    => 'required|integer|exists:tenant.type_kinship,id',
            'status_id'          => 'required|integer',
        ];
    }
}