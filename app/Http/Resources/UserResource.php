<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserProfileResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    
    public function toArray($request)
    {
        //return parent::toArray($request);
         return [
            'id' => $this->id,
            'us_identification'  => $this->us_identification,
            'us_firstname'       => $this->us_firstname,
            'us_secondname'      => $this->us_secondname,
            'us_first_lastname'  => $this->us_first_lastname,
            'us_second_lastname' => $this->us_second_lastname,
            'us_date_birth'      => $this->us_date_birth,
            'us_gender'          => $this->us_gender,
            'us_username'        => $this->us_username,
            'email'              => $this->email,
            'email_verified_at'  => $this->email_verified_at,
            'identification'     => $this->identifications ,
            'user_profiles'      => UserProfileResource::collection($this->userProfiles)
        ];
    }
}
