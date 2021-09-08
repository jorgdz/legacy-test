<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
        $profile = $this->route()->parameter('profile');
        return [
            'pro_name' => 'required|string|unique:tenant.profiles,pro_name,'.$profile->id.'|max:255',
            'status_id' => 'required|integer|exists:tenant.status,id'
        ];
    }
}
