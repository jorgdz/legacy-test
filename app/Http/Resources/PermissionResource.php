<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
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
            'id'          => $this->id ,
            'name'        => $this->name ,
            'alias'       => $this->alias ,
            'description' => $this->description ,
            'parent_name' => $this->parent_name ,
        ];
    }
}
