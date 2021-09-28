<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
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
             'id'         => $this->id ,
             'user_id'    =>  $this->user_id ,
             'profile_id' =>  $this->profile_id ,
             'status'     =>  $this->status ,
             'profile'    =>  $this->profile ,
             'roles'      =>  RoleResource::collection($this->roles)->where('status_id', 1)
         ];
    }
}
