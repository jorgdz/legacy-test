<?php

namespace App\Traits;

use App\Models\Catalog;
use App\Models\Person;

trait SavePerson
{
    public function savePerson($request,
        Catalog $nacionality,
        Catalog $statusMarital,
        Catalog $typeIdentification,
        Catalog $typeReligion,
        Catalog $livingPlace,
        Catalog $city,
        Catalog $currentCity,
        Catalog $sector,
        Catalog $ethnic)
    {
        //Person
        $person = new Person($request->except('pers_nacionality_keyword',
            'status_martital_keyword',
            'type_identification_keyword',
            'type_religion_keyword',
            'vivienda_keyword',
            'city_keyword',
            'current_city_keyword',
            'sector_keyword',
            'ethnic_keyword',
        ));

        $person->pers_nationality = $nacionality->id;
        $person->status_marital_id = $statusMarital->id;
        $person->type_identification_id = $typeIdentification->id;
        $person->type_religion_id = $typeReligion->id;
        $person->vivienda_id = $livingPlace->id;
        $person->city_id = $city->id;
        $person->current_city_id = $currentCity->id;
        $person->sector_id = $sector->id;
        $person->ethnic_id = $ethnic->id;
        //si tiene discapacidad
        if($request->get('pers_has_disability'))
            $person->disabilities()->sync($request->get('pers_disabilities'));

        return $person;
    }
}
