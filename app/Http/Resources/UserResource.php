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
         return [
            'id' => $this->id,
            'us_identification'  => $this->person->pers_identification,
            'us_firstname'       => $this->person->pers_firstname,
            'us_secondname'      => $this->person->pers_secondname,
            'us_first_lastname'  => $this->person->pers_first_lastname,
            'us_second_lastname' => $this->person->pers_second_lastname,
            'us_date_birth'      => $this->person->pers_date_birth,
            'us_gender'          => $this->person->pers_gender, 
            'identification'     => $this->person->identification,
            'us_username'        => $this->us_username,
            'email'              => $this->email,
            'email_verified_at'  => $this->email_verified_at,
            'user_profiles'      => UserProfileResource::collection($this->userProfiles)
        ];
    }
}
