<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreRoleUserProfileRequest extends FormRequest
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
            'roles' => 'numericarray',
        ];
    }
}
