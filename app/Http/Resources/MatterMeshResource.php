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
            'id' => $this->id,
            'mes_name' => $this->mes_name,
            'mes_res_cas' => $this->mes_res_cas,
            'mes_res_ocas' => $this->mes_res_ocas,
            'mes_cod_career' => $this->mes_cod_career,
            'mes_title' => $this->mes_title,
            'mes_itinerary' => $this->mes_itinerary,
            'mes_number_matter' => $this->mes_number_matter,
            'mes_number_matter' => $this->simbology,
            'mes_number_period' => $this->mes_number_period,
            'mes_quantity_external_matter_homologate' => $this->mes_quantity_external_matter_homologate,
            'mes_quantity_internal_matter_homologate' => $this->mes_quantity_internal_matter_homologate,
            'mes_creation_date' => $this->mes_creation_date,
            'mes_acronym'     => $this->mes_acronym,
            'anio' => $this->anio,
            'mes_description' => $this->mes_description,
            'status' => $this->status,
            'mes_modality_id' => $this->modality,
            'education_level' => $this->educationLevel,
            'learningComponent' => $this->learningComponent,
            'matter_mesh'       => collect($this->matterMesh)->where('status_id', 1)->sortBy('order')->values()->all(),
        ];
    }
}
