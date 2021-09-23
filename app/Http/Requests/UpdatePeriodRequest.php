<?php

namespace App\Http\Requests;

use App\Models\Offer;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePeriodRequest extends FormRequest
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
        $period = $this->route()->parameter('period');

        return [
            'per_name' => 'required|string|unique:tenant.periods,per_name,'.$period->id.'|max:255',
            'per_reference' => 'required|string|unique:tenant.periods,per_reference,'.$period->id.'|max:100',
            'per_min_matter_enrollment' => 'required|integer',
            'per_max_matter_enrollment' => 'required|integer',
            'per_num_fees' => 'nullable|integer',
            'per_fees_enrollment' => 'integer|required_if:per_pay_enrollment,true|required_if:per_pay_enrollment,1|lte:per_num_fees',
            'per_pay_enrollment' => 'required|boolean',
            'campus_id' => 'required|integer|exists:tenant.campus,id',
            'type_period_id' => 'required|integer|exists:tenant.type_periods,id',
            'status_id' => 'required|integer|exists:tenant.status,id',
            'offers' => 'array',
            'offers.*' => 'integer|exists:tenant.offers,id|distinct',
            'hourhands' => 'array',
            'hourhands.*' => 'integer|exists:tenant.hourhands,id|distinct'
        ];
    }
}
