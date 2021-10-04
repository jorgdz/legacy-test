<?php

namespace App\Traits;

use App\Exceptions\Custom\SumHourTypeJourneyException;
use App\Models\Collaborator;


trait ValidationHourSummary
{
    function validationCollaborator($request)
    {


        $hour_collaborator = $request->only([
            'hs_classes',
            'hs_classes_examns_preparation',
            'hs_tutoring',
            'hs_bonding',
            'hs_academic_management',
            'hs_research',
            //'hs_total',
        ]);

        $sum_hour_collaborator = array_sum($hour_collaborator);
        
        $collaborator = Collaborator::where('id', $request->collaborator_id)->first();

        
        $type_journey = $collaborator->coll_journey_description; //Tipo jornada lavoral
        $journey_hours = $collaborator->coll_journey_hours; //cantidad de horas de la jornada
        
        switch ($type_journey) {
            case "TC": //tiempo completo  40 horas
               
                $type_journey_dep = 'Tiempo completo';
                $hora =  $journey_hours;
                //cuando el tiempo excede lo establecido
                if (!$this->validation_time_hour($sum_hour_collaborator, $hora)) {
                    throw new SumHourTypeJourneyException(__("messages.sum-hour-collaborator", ['type_journey_dep' => $type_journey_dep, 'hours' => $hora, 'sum_hour_collaborator' => $sum_hour_collaborator]));
                }

                return $sum_hour_collaborator;

                break;
            case "MT": //medio tiempo 20 horas
                $type_journey_dep = 'Medio tiempo';
                $hora = $journey_hours;
                //cuando el tiempo excede lo establecido
                if (!$this->validation_time_hour($sum_hour_collaborator, $hora)) {
                    throw new SumHourTypeJourneyException(__("messages.sum-hour-collaborator", ['type_journey_dep' => $type_journey_dep, 'hours' => $hora, 'sum_hour_collaborator' => $sum_hour_collaborator]));
                }

                return $sum_hour_collaborator;
                break;
            case "TP": //tiempo parcial   menos de 20
                $type_journey_dep = 'Tiempo parcial';
                $hora = $journey_hours;
                //cuando el tiempo excede lo establecido
                if (!$this->validation_time_hour($sum_hour_collaborator, $hora)) {
                    throw new SumHourTypeJourneyException(__("messages.sum-hour-collaborator", ['type_journey_dep' => $type_journey_dep, 'hours' => $hora, 'sum_hour_collaborator' => $sum_hour_collaborator]));
                }
                return $sum_hour_collaborator;
                break;
        }
    }


    function validation_time_hour($sum_hour_collaborator, $hora)
    {
       
        if ($sum_hour_collaborator < $hora || $sum_hour_collaborator > $hora) {

            return false;
            //dd('Tipo de jornada : '.$type_journey_dep . ' debe tener exactamente : '.$hora.' horas.');
        }
        return true;
    }
}
