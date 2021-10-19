<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

//class MatterMeshRequest extends FormRequest
class CourseRequest extends FormRequest
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
            'matter_id'       => 'required|integer|exists:tenant.subjects,id',
            'num_fouls'       => 'nullable|integer',
            'start_date'      => 'nullable|date',
            'end_date'        => 'nullable|date',
            'max_capacity'    => 'required|integer',
            'parallel_id'     => 'required|integer|exists:tenant.parallels,id',
            'classroom_id'    => 'required|integer|exists:tenant.classrooms,id',
            'modality_id'     => 'required|integer|exists:tenant.catalogs,id',
            'hourhand_id'     => 'required|integer|exists:tenant.hourhands,id',
            'period_id'       => 'required|integer|exists:tenant.periods,id',
            'collaborators'   => 'array',
            'collaborators.*' => 'required|integer|exists:tenant.collaborators,id',
            'curriculum_id'   => 'required|integer|exists:tenant.curriculums,id',
            'status_id'       => 'required|integer|exists:tenant.status,id'
        ];

        return $rules;
    }
}
