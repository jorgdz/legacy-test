<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstituteRequest extends FormRequest
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
            'inst_name' => 'required',
            'province_id' => 'required|integer|exists:tenant.catalogs,id',
            'status_id' => 'required|integer|exists:tenant.status,id',
            'type_institute_id' => 'required|integer|exists:tenant.type_institutes,id',
            'economic_group_id' => 'required|integer|exists:tenant.economic_groups,id',
        ];
    }
}
