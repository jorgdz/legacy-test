<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserChangePasswordLoggedFormRequest extends FormRequest
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

        /**
         * Validacion de la contraseña del usuario logeado 
         * sea igual a la contraseña 
         * [current_password] ingresada
         */
        Validator::extend('validatePasswordCurrent', function ($attribute, $value, $parameters, $validator) {


            $user = request()->user();

            //pass guardada en BD (cifrada)
            $passwordSaveBd = $user->password;
            //pass recibida desde el cliente (request)
            $passwordRequest = request()->current_password;

            //compara contrasena (recibida->request vs hash(guardado en BD))
            if (!Hash::check($passwordRequest, $passwordSaveBd)) {

                $validator->addReplacer('validatePasswordCurrent',  function ($message, $attribute, $rule, $parameters) {
                    return str_replace('', '', __('messages.error-change-password-logged'));
                });

                return false;
            }


            //Si la contraseña coincide
            return true;
        });




        return [
            //'user_profile_id'=>'required|integer',
            // 'status_id' => 'required|integer|exists:tenant.status,id'
            'current_password' => 'required|validatePasswordCurrent',
            'password' => 'required| min:6| max:8 |confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.]).{6,}$/',
            'password_confirmation' => 'required| min:6'

        ];
    }


    /* Get the validation messages that apply to the request.
    *
    * @return array
    */
    public function messages()
    {
        // use trans instead on Lang 
        return [
            'password.regex' => str_replace('', '', __('messages.validate-format-new-password')),
        ];
    }
}
