<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
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
            'name'          => 'required|unique:tenant.permissions,name',
            'alias'         => 'required|unique:tenant.permissions,alias',
            'parent_name'   => 'required|string',
            'status_id'     => 'required|integer|exists:tenant.status,id',
        ];
    }
}
