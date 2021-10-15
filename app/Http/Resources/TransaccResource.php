<?php

namespace App\Http\Resources;

use App\Models\Application;
use Illuminate\Http\Resources\Json\JsonResource;

class TransaccResource extends JsonResource
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
            "secuencial" => $this->transac_secuencial,
            "register_date" => $this->transac_register_date,
            "comments" => $this->transac_comments,
            "user" => $this->user,
            "last_revision_status" => $this->typeApplicationStatusRoles->typeApplicationStatus->status->st_name,
            "status_id" => $this->status_id,
            "application" => new ApplicationResource(Application::where('app_code', $this->transac_secuencial)->first()),
        ];
    }
}
