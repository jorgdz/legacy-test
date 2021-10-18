<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeApplicationStatusRequest extends FormRequest
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
            // 'order' => 'required|integer',
            'type_application_id' => 'required|exists:tenant.type_applications,id',
            'status_id' => 'required|exists:tenant.status,id',
            'roles' => 'required|array',
            'roles.*.role_id' => 'required|exists:tenant.roles,id'
        ];
    }
}
