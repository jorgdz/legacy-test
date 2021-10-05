<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePositionRequest extends FormRequest
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
            'pos_name' => "required|unique:tenant.positions,pos_name,{$this->route('position')->id}",
            "pos_keyword"    => "required|string|max:255|unique:tenant.positions,pos_keyword,{$this->route('position')->id}",
            'role_id' => 'required|integer|exists:tenant.roles,id',
            'department_id' => 'integer|exists:tenant.departments,id',
            'status_id' => 'integer|exists:tenant.status,id'
        ];
    }
}
