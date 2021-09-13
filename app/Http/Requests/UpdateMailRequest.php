<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMailRequest extends FormRequest
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
            'transport' => 'required|string|max:255',
            'host' => 'required|string|unique:landlord.mails,host|max:255',
            'port' => 'required|integer',
            'encryption' => 'required|string|max:255',
            'user' => 'required|string|unique:landlord.mails,encryption|max:255',
            'password' => 'required|string|max:255',
            #el tenant_id se lo toma directamente de los parametros por url de la solicitud
            #'tenant_id' => 'required|integer|exists:landlord.tenants,id'
        ];
    }
}
