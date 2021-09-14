<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmergencyContactFormRequest extends FormRequest
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
            'emergencyContacts.*.em_ct_name'        => 'required|string',
            'emergencyContacts.*.em_ct_first_phone' => 'required|string',
            'emergencyContacts.*.status_id'         => 'required|integer|exists:tenant.status,id',
            'emergencyContacts.*.type_kinship_id'   => 'required|integer|exists:tenant.type_kinship,id',
            'emergencyContacts.*.person_id'         => 'required|integer|exists:tenant.persons,id',
        ];
    }
}
