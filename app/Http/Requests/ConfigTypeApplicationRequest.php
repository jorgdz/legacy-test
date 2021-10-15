<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigTypeApplicationRequest extends FormRequest
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
        return [
            'conf_typ_description' => 'nullable|string',
            'conf_typ_data_type' => 'nullable|string',
            'conf_typ_object_name' => 'nullable|string',
            'conf_typ_object_id' => 'nullable|string',
            'conf_typ_file_path' => 'nullable|string',
            'type_application_id' => 'required|exists:tenant.type_applications,id',
            'status_id' => 'required|exists:tenant.status,id'
        ];
    }
}
