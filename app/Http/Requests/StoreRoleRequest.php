<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

class StoreRoleRequest extends FormRequest
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
         * Validacion verificar si existe el rol
         */
        Validator::extend('validateName', function ($attribute, $value, $parameters, $validator) {
            //dd($attribute, $value, $parameters, $validator);
            $countRole = DB::table('dbo.roles')
                //->where('name', request()->name)
                ->where($attribute, $value)
                ->where('deleted_at', null)->count();

            if ($countRole > 0) {
                $validator->addReplacer('validateName',  function ($message, $attribute, $rule, $parameters) {
                    return str_replace(':attribute', __('validation.attributes.'.$attribute), __('validation.unique'));
                });
                return false;
            }

            return true;
        });

        return [
            // 'name'      => 'required|string|unique:tenant.roles,name',
            'name'      => 'required|string|validateName',
            // 'keyword'   => 'required|string|unique:tenant.roles,keyword',
            'keyword'   => 'required|string|validateName',
            'status_id' => 'required|integer',
        ];
    }
}
