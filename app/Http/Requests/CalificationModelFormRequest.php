<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalificationModelFormRequest extends FormRequest
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
        
        switch ($this->method()) {
            case 'POST':
                return [
                    'cal_mod_name' => ' required|string|max:255|unique:tenant.calification_models,cal_mod_name',
                    'cal_mod_acronym' => ' required|string|max:10|unique:tenant.calification_models,cal_mod_acronym',
                    'cal_mod_equivalence' => ' required|boolean', 
                    'status_id' => 'required|integer|exists:tenant.status,id'
                ];
                break;
            case 'PUT':

                return [
                    'cal_mod_name' => ' required|string|max:255|unique:tenant.calification_models,cal_mod_name',
                    'cal_mod_acronym' => ' required|string|max:10|unique:tenant.calification_models,cal_mod_acronym',
                    'cal_mod_equivalence' => ' required|boolean', 
                    'status_id' => 'required|integer|exists:tenant.status,id'
                   
                ];
                break;

            case 'PATCH':
                return [
                    'cal_mod_name' => ' required|string|max:255|unique:tenant.calification_models,cal_mod_name',
                    'cal_mod_acronym' => ' required|string|max:10|unique:tenant.calification_models,cal_mod_acronym',
                    'cal_mod_equivalence' => ' required|boolean', 
                    'status_id' => 'required|integer|exists:tenant.status,id'
                ];
                break;

                // default:
                //     $this->reglas();

        }
    }
}
