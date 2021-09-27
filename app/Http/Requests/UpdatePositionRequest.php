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
            'role_id' => 'integer|exists:tenant.roles,id',
            'status_id' => 'integer|exists:tenant.status,id'
        ];
    }
}
