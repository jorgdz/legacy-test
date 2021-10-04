<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TenantResource extends JsonResource
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
            'name'          => $this->name,
            'domain'        => $this->domain,
            'domain_client' => $this->domain_client,
            'logo_name'     => $this->logo_name,
            'logo_path'     => $this->logo_path,
            'description'   => $this->description
        ];
    }
}
