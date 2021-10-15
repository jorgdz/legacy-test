<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
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
            "id" => $this->id,
            "app_code" => $this->app_code,
            "app_description" => $this->app_description,
            "app_register_date" => $this-> app_register_date,
            "type_application" => $this->typeApplication->typ_app_name,
            "status_id" => $this->status_id,
        ];
    }
}
