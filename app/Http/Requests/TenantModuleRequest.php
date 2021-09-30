<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantModuleRequest extends FormRequest
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
        $rules = [
            'tenant_id' => 'required|integer|exists:landlord.tenants,id',
            'module_id' => 'required|integer|exists:landlord.modules,id',
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['tenant_id'] = [
                'nullable',
                'integer',
                'exists:landlord.tenants,id',
            ];
            $rules['module_id'] = [
                'nullable',
                'integer',
                'exists:landlord.tenants,id',
            ];
        }
        return $rules;
    }
}
