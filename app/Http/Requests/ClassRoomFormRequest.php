<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRoomFormRequest extends FormRequest
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
            'cl_name' => 'required|unique:tenant.classrooms,cl_name',
            'cl_cap_max' => 'integer',
            'cl_acronym' => 'max:4',
            'campus_id' => 'integer|exists:tenant.campus,id',
            'classroom_type_id' => 'integer|exists:tenant.classroom_types,id',
            'status_id' => 'integer|exists:tenant.status,id'
        ];
    }
}
