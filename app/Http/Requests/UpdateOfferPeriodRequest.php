<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOfferPeriodRequest extends FormRequest
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
        $offer = $this->route()->parameter('offer');
        $period = $this->route()->parameter('period');
        return [
            //'offer_id' => 'required|integer|exists:tenant.offers,id',
            'period_id' => 'required|integer|exists:tenant.periods,id|'.Rule::unique('offer_period')->where(function ($query) use ($offer) {
                return $query->where('offer_id', $offer->id);
            })->ignore($period->id,'period_id')
        ];
    }
}
