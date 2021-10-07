<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampusFormRequest extends FormRequest
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
            'cam_name'          => 'required',
            'cam_direction'     => 'required',
            'cam_initials'      => 'required',
            'status_id'         => 'required|integer|exists:tenant.status,id',
        ];
    }
}
