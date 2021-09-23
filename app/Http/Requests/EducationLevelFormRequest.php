<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationLevelFormRequest extends FormRequest
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
            'edu_name' => 'required|max:255',
            'edu_alias' => 'required|max:255',
            'offer_id' => 'required|integer|exists:tenant.offers,id',
            'status_id' => 'required|integer|exists:tenant.status,id'
        ];
    }
}
