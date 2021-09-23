<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'               => $this->id,
            'off_name'         => $this->off_name,
            'off_description'  => $this->off_description,
            'status_id'        => $this->status_id,
            'education_levels' => $this->educationLevelsParent,
            'status'           => $this->status,
            'periods'          => $this->periods,
            'simbologies'      => $this->simbologies, 
        ];
    }
}
