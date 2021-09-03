<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeriodStageRequest extends FormRequest
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
            "stage_id"   => "required|integer|exists:tenant.stages,id",
            "period_id"  => "required|integer|exists:tenant.periods,id",
            "start_date" => "required|date",
            "end_date"   => "required|date",
            "status_id"  => "required|integer|exists:tenant.status,id"
        ];
    }
}
