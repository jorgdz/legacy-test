<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateComponentRequest extends FormRequest
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
            'com_acronym' => 'required|string|'.Rule::unique('components')->where('com_acronym', $this->com_acronym)->ignore($this->component->id, 'id'),
            'com_name'   => 'required|string',
            'status_id'   => 'required|integer',
        ];
    }
}
