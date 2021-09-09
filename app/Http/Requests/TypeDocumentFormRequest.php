<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeDocumentFormRequest extends FormRequest
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
                    'typ_doc_name' => 'required|max:255',
                    'typ_doc_description' => 'required|max:255',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                ];
                break;
            case 'PUT':
                return [
                    'typ_doc_name' => 'required|max:255',
                    'typ_doc_description' => 'required|max:255',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                    //'edu_name' => 'required|max:255|unique:tenant.meshs,mes_name,' . $this->mesh->id,
                ];
                break;

            case 'PATCH':
                return [
                    'typ_doc_name' => 'required|max:255',
                    'typ_doc_description' => 'required|max:255',
                    'status_id' => 'required|integer|exists:tenant.status,id'
                    //'edu_name' => 'required|max:255|unique:tenant.meshs,mes_name,' . $this->mesh->id,
                ];
                break;

                // default:
                //     $this->reglas();

        }
    }
}
