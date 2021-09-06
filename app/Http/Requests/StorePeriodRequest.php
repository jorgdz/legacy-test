<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StorePeriodRequest extends FormRequest
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
        $rules = [
            'campus_id' => 'required|integer|exists:tenant.campus,id',
            'type_period_id' => 'required|integer|exists:tenant.type_periods,id',
            'status_id' => 'required|integer|exists:tenant.status,id'
        ];
        return $rules;
    }
}
