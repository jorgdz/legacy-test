<?php

namespace App\Traits;

use App\Models\Student;
use Illuminate\Support\Facades\DB;



trait Helper
{
    function stud_code_avaliable(){
        $currentYear = intval(date('Y'));
        $student = Student::withTrashed()->orderBy('id','desc')->first();
        if(is_null($student))
            return $currentYear.'000001' ;
        else{
            $last_year_stud_codi = substr($student->stud_code,0,4);
            if($currentYear>$last_year_stud_codi)
                return $currentYear.'000001';
            else if($currentYear==$last_year_stud_codi){
                $counter_stud_codi = substr($student->stud_code,4,10);
                $counter_stud_codi=$counter_stud_codi+1;
                switch (strlen($counter_stud_codi)) {
                    case 1:
                        $zero_str='00000';
                        break;
                    case 2:
                        $zero_str='0000';
                        break;
                    case 3:
                        $zero_str='000';
                        break;
                    case 4:
                        $zero_str='00';
                        break;
                    case 5:
                        $zero_str='0';
                        break;
                    default:
                        $zero_str='';
                        break;

                }
                return $currentYear.$zero_str.$counter_stud_codi;
            }
        }
    }

    function generateKeyUserAuth ($token) {
        $url = request()->getHost();
        return "{$url}/api/whoami?token={$token}";
    }
}
