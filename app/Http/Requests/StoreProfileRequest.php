<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
            'pro_name' => 'required|string|unique:tenant.profiles,pro_name|max:255',
            'keyword'   => 'required|string|unique:tenant.profiles,keyword',
            'status_id' => 'required|integer|exists:tenant.status,id'
        ];
    }
}
