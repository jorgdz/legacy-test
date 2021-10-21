<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequisitionApplicationRequest extends FormRequest
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
            "app_description"               => "nullable|string",
            "typ_app_acronym"               => "required|exists:tenant.type_applications,typ_app_acronym",
            "user_id"                       => "required|exists:tenant.users,id",
            "json"                          => "required|array",
            "json.0.user_id_requisition"    => "required|exists:tenant.users,id",
            "json.0.coll_email"             => "required|string|unique:tenant.collaborators,coll_email",
            "json.0.offer_id"               => "required|exists:tenant.offers,id",
            "json.0.hourhand_id"            => "required|exists:tenant.hourhands,id",
            "json.0.period_id"              => "required|exists:tenant.periods,id",
            "json.0.education_level_id"     => "required|exists:tenant.education_levels,id",
            "json.1.tipo_vinculacion"       => "required|boolean",
            "json.1.tipo_dedicacion"        => "required|string|in:TC,MT,PA",
            "role_id"                       => "required|exists:tenant.roles,id"
        ];
    }
}
