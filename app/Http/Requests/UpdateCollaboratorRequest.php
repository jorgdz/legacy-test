<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCollaboratorRequest extends FormRequest
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
            'coll_email'       => 'required|email|unique:tenant.users,email,'.$this->route('collaborator')->id,
            'coll_journey_description'       => 'required|string|max:3|'.Rule::in(['TC', 'MT','TP']),
            'coll_dependency'       => 'required_if:coll_journey_description,==,"MT"|nullable|digits_between:0,1',
            'coll_journey_hours'       => 'required_if:coll_journey_description,==,"TP"|nullable|integer',
            'position_company_id'       => 'nullable|integer|exists:tenant.positions,id',
            'coll_entering_date' => 'required|date',
            'coll_leaving_date' => 'nullable|date',
            'coll_membership_num'       => 'nullable|integer',
            'coll_has_nomination'  => 'nullable|digits_between:0,1',
            'coll_nomination_entering_date' => 'nullable|date',
            'coll_nomination_leaving_date' => 'nullable|date',
            'status_id' => 'required|integer|exists:tenant.status,id',
            'education_level_principal_id'=>'nullable|integer|exists:tenant.education_levels,id',
        ];
    }
}
