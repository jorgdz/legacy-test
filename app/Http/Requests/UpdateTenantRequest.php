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
            'name'   => 'required|max:255|string|unique:landlord.tenants,name,'.$tenant->id,
            'transport'   => 'required|string|max:255',
            'host'   => 'required|string|max:255',
            'port'   => 'required|string|max:255',
            'encryption'   => 'required|string|max:255',
            'username'   => 'required|max:255|string|unique:landlord.mails,username,'.$tenant->mail->id,
            'password'   => 'required|max:255|string|unique:landlord.mails,password,'.$tenant->mail->id,            
            //'logo'   => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'//|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000
        ];
    }
}
