<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MatterMeshResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'mes_name'              => $this->mes_name,
            'mes_description'       => $this->mes_description,
            'mes_acronym'           => $this->mes_acronym,
            'education_level'       => $this->educationLevel,
            'pensum'                => $this->pensum,
            'status'                => $this->status,
            'matter_mesh'           => $this->matterMesh
        ];
    }
}
