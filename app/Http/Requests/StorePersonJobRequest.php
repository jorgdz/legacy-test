<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonJobRequest extends FormRequest
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
            "per_job_organization" => "nullable|string",
            "per_job_position" => "nullable|string",
            "per_job_direction" => "nullable|string",
            "per_job_phone" => "nullable|string|max:20",
            "start_date" => "nullable|date",
            "end_date"   => "nullable|date",
            "per_job_current" => "nullable|boolean",
            "city_id"   => "required|integer|exists:tenant.cities,id",
            "person_id"  => "required|integer|exists:tenant.persons,id",
            "status_id"  => "required|integer|exists:tenant.status,id"
        ];
    }
}
