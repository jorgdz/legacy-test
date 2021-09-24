<?php

namespace App\Traits;

use App\Models\StudentRecordProgram;


trait ValidationStudentRecordPrograms
{
    /**
     * Validacion para guardar 
     * 
     */
    function validationStudentRecordProgramsStore($request)
    {


        $studentRecordId = $request->student_record_id;
        $typeStudentProgramId = $request->type_student_program_id;
        $statusId = $request->status_id;
       


        $collectStdRecPro = collect(
            StudentRecordProgram::where("student_record_id", "=", $studentRecordId)
                ->get()->all()
        );


        if (($collectStdRecPro->contains('type_student_program_id', $typeStudentProgramId))) {
            return false;
        }


        return true;


    }


    


    /**
     * Validacion para actualizar
     * 
     */
    function validationStudentRecordProgramsUpdate($request,  $studentRecordProgram)
    {
       
        $studentRecordId = $studentRecordProgram->student_record_id;
        $typeStudentProgramId = $studentRecordProgram->type_student_program_id;
        $statusId = $studentRecordProgram->status_id;
        $id = $studentRecordProgram->id;

        $aux = 0;
        $boolean=false;


        $collectStdRecPro = collect(
            StudentRecordProgram::where("student_record_id", "=", $studentRecordId)->get()->all()
        );


        foreach ($collectStdRecPro as $obj) {
            if ($typeStudentProgramId == $obj->type_student_program_id) {
                $aux++;
                //return $obj->type_student_program_id;
            }
        }

        //cuando ese (type_student_program_id)id esta libre
        if($aux == 0){
            $boolean = true;
        }

        
       
        //ya existe el type_student_program_id y SOLO SE VA cambiar el estado 
        if($boolean == false && $aux > 0){
            //obtener de la coleccion solo el elemento por id 
            $stdProg = $collectStdRecPro->where('id', $id);
            
        
            $p_status_id = 0;
            $p_type_student_program_id = 0;
            //recorrer el objeto y asignar los valores de "estado" y "tipo programa estudiante" 
            foreach ($stdProg as $obj) {
                $p_status_id = $obj->status_id;
                $p_type_student_program_id = $obj->type_student_program_id;
            }

            //verificar 
            //si "status_id" estado guardo en base es diferente al que se esta ingresando 
            // y el "type_student_program_id" es igual al de bd y el q esta en el request
            //solo se va actualizar el estado
            if( $p_status_id != $statusId  && $p_type_student_program_id == $typeStudentProgramId){
                $boolean = true;
              
            }else{
                $boolean = false;
            }
        }

        return $boolean;
       
    }
}
