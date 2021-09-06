<?php

namespace App\Http\Requests;

use App\Models\Offer;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOfferPeriodRequest extends FormRequest
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
            //'offer_id' => 'required|integer|exists:tenant.offers,id',
            'period_id' => 'required|integer|exists:tenant.periods,id',
        ];
        if (in_array($this->method(), ['POST'])) {
            $offer = $this->route()->parameter('offer');
            $rules['period_id'] = [
                'required',
                'integer',
                Rule::unique('offer_period')->where(function ($query) use ($offer) {
                    return $query->where('offer_id', $offer->id);
                }),
            ];
        }
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $offer = $this->route()->parameter('offer');
            $period = $this->route()->parameter('period');
            $rules['period_id'] = [
                'required',
                'integer',
                Rule::unique('offer_period')->where(function ($query) use ($offer) {
                    return $query->where('offer_id', $offer->id);
                })->ignore($period->id,'period_id'),
            ];
        }
        return $rules;
    }
}
