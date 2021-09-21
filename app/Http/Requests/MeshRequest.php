<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MeshRequest extends FormRequest
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
                    'mes_name' => 'required|max:255|unique:tenant.meshs,mes_name',
                    'mes_acronym' => 'required|max:3',
                    'pensum_id' => 'required|integer|exists:tenant.pensums,id',
                    'level_edu_id' => 'required|integer|exists:tenant.education_levels,id',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                ];
                break;
            case 'PUT':
                return [

                    'mes_name' => 'required|max:255|unique:tenant.meshs,mes_name,' . $this->mesh->id,
                    'mes_acronym' => 'required|max:3',
                    'pensum_id' => 'required|integer|exists:tenant.pensums,id',
                    'level_edu_id' => 'required|integer|exists:tenant.education_levels,id',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                ];
                break;

            case 'PATCH':
                return [

                    'mes_name' => 'required|max:255|unique:tenant.meshs,mes_name,' . $this->mesh->id,
                    'mes_acronym' => 'required|max:3',
                    'pensum_id' => 'required|integer|exists:tenant.pensums,id',
                    'level_edu_id' => 'required|integer|exists:tenant.education_levels,id',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                ];
                break;

                // default:
                //     $this->reglas();

        }
    }
}
