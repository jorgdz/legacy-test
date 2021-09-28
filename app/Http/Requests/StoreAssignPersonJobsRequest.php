<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssignPersonJobsRequest extends FormRequest
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
            'jobs' => 'required|array',
            'jobs.*.per_job_organization' => 'nullable|string',
            'jobs.*.per_job_position' => 'nullable|string',
            'jobs.*.per_job_direction' => 'nullable|string',
            'jobs.*.per_job_phone' => 'nullable|string|max:20',
            "jobs.*.start_date" => "nullable|date",
            "jobs.*.end_date"   => "nullable|date",
            "jobs.*.per_job_current" => "nullable|boolean",
            "jobs.*.per_job_iess_affiliated" => "nullable|boolean",
            "jobs.*.city_id"   => "required|integer|exists:tenant.catalogs,id",
            "jobs.*.status_id"  => "required|integer|exists:tenant.status,id"
        ];
    }
}
