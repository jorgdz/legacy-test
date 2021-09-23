<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRecordPeriodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        /* $rules = [
            'cat_name'    => 'required|string|unique:tenant.catalogs,cat_name',
            'cat_acronym' => 'nullable|unique:tenant.catalogs,cat_acronym|max:4',
            'parent_id'   => 'nullable|integer|exists:tenant.catalogs,id',
            'status_id'   => 'required|integer|exists:tenant.status,id',
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['cat_name'] = [
                'nullable',
                'string',
                'unique:tenant.catalogs,cat_name,' . $this->catalog->id
            ];
            $rules['cat_acronym'] = [
                'nullable',
                'string',
                'max:4',
                'unique:tenant.catalogs,cat_acronym,' . $this->catalog->id
            ];
        }

        return $rules; */
    }
}
