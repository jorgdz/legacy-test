<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFormRequest extends FormRequest
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
            'co_name'    => 'required',
            'co_website' => 'required',
            'co_email'   => "required:unique:tenant.companies,co_email,{$this->route('company')->id}",
            'status_id'  => 'required',
            'co_ruc'    => 'required',
        ];
    }
}
