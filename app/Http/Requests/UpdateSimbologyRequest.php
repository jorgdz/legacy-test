<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSimbologyRequest extends FormRequest
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
            'sim_color' => 'required|string',
            'sim_description' => "required|string|unique:tenant.simbologies,sim_description,{$this->route('simbology')->id}",
            'status_id' => 'integer|exists:tenant.status,id'
        ];
    }
}
