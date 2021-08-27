<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class StoreUserRequest extends FormRequest
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
        Validator::extend('numericarray', function($attribute, $value, $parameters)
        {
            foreach($value as $v) {
                if(!is_int($v)) return false;
            }
            return true;
        });
        return [
            'name' => 'required',
            'email' => 'required|unique:tenant.users|email',
            'password' => 'required',
            'profiles' => 'numericarray',
        ];
    }
}
