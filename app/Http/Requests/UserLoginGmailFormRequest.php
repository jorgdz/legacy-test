<?php

namespace App\Http\Requests;

use App\Models\UserProfile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class UserLoginGmailFormRequest extends FormRequest
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
        // dd(request()->email);
        // //|unique:tenant.type_periods,tp_name,'.$typePeriod->id.

        /**
         * Validacion de la contraseña del usuario logeado 
         * sea igual a la contraseña 
         * [current_password] ingresada
         */
        Validator::extend('existsEmail', function ($attribute, $value, $parameters, $validator) {



            $validarCorreo = UserProfile::where('email', request()->email)->count();
        
            if (!$validarCorreo > 0) {
               
                $validator->addReplacer('existsEmail',  function ($message, $attribute, $rule, $parameters) {
                    return str_replace('', '', __('messages.not-registered-email'));
                });

                return false;
            }

            //Si el correo coincide
            return true;
        });


        return [

            'email' => 'required|email|max:255'//|existsEmail
            //'email' => 'required|email|unique:tenant.user_profiles,email,'.request()->email.'max:255'
        ];
    }
}
