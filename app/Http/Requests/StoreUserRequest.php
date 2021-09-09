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
        $rules = [
            /* 'type_identification_id' => 'required|integer|exists:tenant.type_identifications,id',
            'us_identification'      => 'required|string|unique:tenant.users,us_identification',
            'us_firstname'  => 'required|string',
            'us_secondname' => 'required|string',
            'us_first_lastname'  => 'required|string',
            'us_second_lastname' => 'required|string',
            'us_date_birth' => 'required|date', */
            /* 'us_gender' => 'required|string', */
            'us_username'   => 'required|string|unique:tenant.users,us_username',
            'email'      => 'required|email|unique:tenant.users,email',
            'password'   => 'required|string',
            'status_id'  => 'required|integer|exists:tenant.status,id',
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            unset($rules['password']);
            /* $rules['us_identification'] = [
                'unique:tenant.users,us_identification,' . $this->user->id
            ]; */
            $rules['us_username'] = [
                'unique:tenant.users,us_username,' . $this->user->id
            ];
            $rules['email'] = [
                'email',
                'unique:tenant.users,email,' . $this->user->id
            ];
            $rules['profiles'] = [
                'array'
            ];
            $rules['profiles.*'] = [
                'integer'
            ];
        }

        return $rules;
    }
}
