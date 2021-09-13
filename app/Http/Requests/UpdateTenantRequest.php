<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTenantRequest extends FormRequest
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
        $tenant = app('currentTenant');
        //dd($tenant->mail->id);
        return [
            'name'   => 'required|string|unique:landlord.tenants,name,'.$tenant->id.'|max:255',
            'transport'   => 'required|string|unique:landlord.mails,transport,'.$tenant->mail->id.'|max:255',
            'host'   => 'required|string|unique:landlord.mails,host,'.$tenant->mail->id.'|max:255',
            'port'   => 'required|integer|unique:landlord.mails,port,'.$tenant->mail->id,
            'encryption'   => 'required|string|unique:landlord.mails,encryption,'.$tenant->mail->id.'|max:255',
            'username'   => 'required|string|unique:landlord.mails,username,'.$tenant->mail->id.'|max:255',
            'password'   => 'required|string|unique:landlord.mails,password,'.$tenant->mail->id.'|max:255',
            #'logo'   => 'required|string|unique:landlord.tenants,logo,'.$tenant->id.'|max:255'
        ];
    }
}
