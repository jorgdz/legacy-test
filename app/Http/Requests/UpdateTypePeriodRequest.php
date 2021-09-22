<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypePeriodRequest extends FormRequest
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
        $typePeriod = $this->route()->parameter('typePeriod');
        return [
            'tp_name' => 'required|string|unique:tenant.type_periods,tp_name,'.$typePeriod->id.'|max:255',
            'tp_min_matter_enrollment' => 'required|integer',
            'tp_max_matter_enrollment' => 'required|integer',
            'tp_num_fees' => 'nullable|integer',
            'tp_fees' => 'nullable|required_if:tp_pay_enrollment,true|required_if:tp_pay_enrollment,1',
            'tp_pay_enrollment' => 'required|boolean',
            'status_id' => 'required|integer|exists:tenant.status,id',
        ];
    }
}
