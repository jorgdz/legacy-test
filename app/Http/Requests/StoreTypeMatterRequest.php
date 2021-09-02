<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeMatterRequest extends FormRequest
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
            'tm_name' => 'required|string',
            'tm_order' => 'required|integer',
            'mt_cobro' => 'required|boolean',
            'mt_matter_count' => 'required|boolean',
            'status_id' => 'required|integer|exists:tenant.status,id'
        ];
    }
}
