<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParallelFormRequest extends FormRequest
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
            'par_name' => 'required|unique:tenant.parallels,par_name',
            'par_acronym' => 'max:3'
        ];
    }
}
