<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules = [
                "app_description"                       => "nullable|string",
                // "app_register_date"                     => "nullable|date",
                "status_id"                             => "required|integer|exists:tenant.status,id",
            ];

            return $rules;
        }

        $rules = [
            "app_description"                       => "nullable|string",
            // "app_register_date"                     => "nullable|date",
            "typ_app_acronym"                       => "required|string",
            "details"                               => "required|array",
            "details.*.config_type_application_id"  => "required|integer|exists:tenant.config_type_applications,id",
            "role_id"                               => "required|integer|exists:tenant.roles,id",
            // "status_id"                             => "required|integer|exists:tenant.status,id",
        ];

        return $rules;
    }
}
