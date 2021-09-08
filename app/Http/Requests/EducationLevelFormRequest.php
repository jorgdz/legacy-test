<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationLevelFormRequest extends FormRequest
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
                    'edu_name' => 'required|max:255',
                    'edu_alias' => 'required|max:255',
                    'edu_order' => 'required|integer',
                    'offer_id' => 'required|integer|exists:tenant.offers,id',
                    'principal_id' => 'required|integer',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                ];
                break;
            case 'PUT':
                return [
                    'edu_name' => 'required|max:255',
                    'edu_alias' => 'required|max:255',
                    'edu_order' => 'required|integer',
                    'offer_id' => 'required|integer|exists:tenant.offers,id',
                    'principal_id' => 'required|integer',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                    //'edu_name' => 'required|max:255|unique:tenant.meshs,mes_name,' . $this->mesh->id,
                    
                ];
                break;

            case 'PATCH':
                return [
                    'edu_name' => 'required|max:255',
                    'edu_alias' => 'required|max:255',
                    'edu_order' => 'required|integer',
                    'offer_id' => 'required|integer|exists:tenant.offers,id',
                    'principal_id' => 'required|integer',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                ];
                break;

                // default:
                //     $this->reglas();

        }
    }
}
