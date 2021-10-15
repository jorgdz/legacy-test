<?php

namespace App\Http\Requests;

use App\Models\Hourhand;
use App\Models\Offer;
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
        return [
            'per_name' => 'required|string|unique:tenant.periods,per_name|max:255',
            // 'per_reference' => 'required|string|unique:tenant.periods,per_reference|max:100',
            'per_min_matter_enrollment' => 'required|integer',
            'per_max_matter_enrollment' => 'required|integer',
            'campus' => 'array',
            'campus.*' => 'integer|exists:tenant.campus,id',
            'per_num_fees' => 'nullable|integer',
            'per_fees_enrollment' => 'integer|required_if:per_pay_enrollment,true|required_if:per_pay_enrollment,1|lte:per_num_fees',
            'per_pay_enrollment' => 'required|boolean',
            'type_period_id' => 'required|integer|exists:tenant.type_periods,id',
            'status_id' => 'required|integer|exists:tenant.status,id',
            'offers' => 'array',
            'offers.*' => 'integer|exists:tenant.offers,id|distinct',
            'stages' => 'array',
            'stages.*.stage_id' => 'integer|exists:tenant.stages,id|distinct',
            'stages.*.start_date' => 'required|date',
            'stages.*.end_date' => 'required|date',
            'stages.*.status_id' => 'integer|exists:tenant.status,id',
            'hourhands' => 'array',
            'hourhands.*' => 'integer|exists:tenant.hourhands,id|distinct'
        ];
    }
}
