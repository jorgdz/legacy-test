<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
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
            'keyword'     => $this->keyword,
            'description' => $this->description ,
            'permissions' => PermissionResource::collection($this->permissions)->where('status_id', 1)->groupBy('parent_name'),
        ];
    }
}
