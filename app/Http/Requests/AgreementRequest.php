<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgreementRequest extends FormRequest
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
            'agr_name' => 'required',
            'agr_num_matter_homologate' => 'nullable|integer',
            'agr_start_date' => 'required|date',
            'agr_end_date' => 'required|date|after_or_equal:agr_start_date',
            'institute_id' => 'integer|exists:tenant.institutes,id',
            'status_id' => 'integer|exists:tenant.status,id'
        ];
    }
}
