<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePensumRequest extends FormRequest
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
            'pen_name' => 'unique:tenant.pensums,pen_name,' . $this->pensum->id,
            'pen_acronym' => 'between:2,3',
            'status_id' => 'required|integer|exists:tenant.status,id'
        ];
    }
}
