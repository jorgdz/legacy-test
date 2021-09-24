<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserProfileRequest extends FormRequest
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
        $user = $this->route()->parameter('user');
        return [
            'profile_id' => 'required|integer|exists:tenant.profiles,id|'.Rule::unique('user_profiles')->where(function ($query) use ($user) {
                return $query->where('user_id', $user->id);
            })->where('deleted_at', NULL),
            'status_id' => 'required|integer|exists:tenant.status,id',
        ];
    }
}
