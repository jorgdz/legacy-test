<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('type_periods')->insert([
            ['tp_name' => 'Semestre',           'tp_description' => 'Semestre description',         'tp_min_matter_enrollment' => '1', 'tp_max_matter_enrollment' => '3', 'tp_num_fees' => '10', 'tp_fees' => '300', 'tp_pay_enrollment' => 1, 'status_id' => 1],
            ['tp_name' => 'Trimestre',          'tp_description' => 'Trimestre description',        'tp_min_matter_enrollment' => '1', 'tp_max_matter_enrollment' => '3', 'tp_num_fees' => '10', 'tp_fees' => '300', 'tp_pay_enrollment' => 0, 'status_id' => 1],
            ['tp_name' => 'Bimestre',           'tp_description' => 'Bimestre description',         'tp_min_matter_enrollment' => '1', 'tp_max_matter_enrollment' => '3', 'tp_num_fees' => '10', 'tp_fees' => '300', 'tp_pay_enrollment' => 1, 'status_id' => 1],
            ['tp_name' => 'Intensivo',          'tp_description' => 'Intensivo description',        'tp_min_matter_enrollment' => '1', 'tp_max_matter_enrollment' => '3', 'tp_num_fees' => '10', 'tp_fees' => '300', 'tp_pay_enrollment' => 0, 'status_id' => 1],
            ['tp_name' => 'Profesionalismo',    'tp_description' => 'Profesionalismo description',  'tp_min_matter_enrollment' => '1', 'tp_max_matter_enrollment' => '3', 'tp_num_fees' => '10', 'tp_fees' => '300', 'tp_pay_enrollment' => 1, 'status_id' => 1],
            ['tp_name' => 'Curso',              'tp_description' => 'Curso description',            'tp_min_matter_enrollment' => '1', 'tp_max_matter_enrollment' => '3', 'tp_num_fees' => '10', 'tp_fees' => '300', 'tp_pay_enrollment' => 0, 'status_id' => 1],
            ['tp_name' => 'Anual',              'tp_description' => 'Anual description',            'tp_min_matter_enrollment' => '1', 'tp_max_matter_enrollment' => '3', 'tp_num_fees' => '10', 'tp_fees' => '300', 'tp_pay_enrollment' => 1, 'status_id' => 1],
            ['tp_name' => 'Ordinario',          'tp_description' => 'Ordinario description',        'tp_min_matter_enrollment' => '1', 'tp_max_matter_enrollment' => '3', 'tp_num_fees' => '10', 'tp_fees' => '300', 'tp_pay_enrollment' => 0, 'status_id' => 1],
            ['tp_name' => 'Extraordinario',     'tp_description' => 'Extraordinario description',   'tp_min_matter_enrollment' => '1', 'tp_max_matter_enrollment' => '3', 'tp_num_fees' => '10', 'tp_fees' => '300', 'tp_pay_enrollment' => 1, 'status_id' => 1],
            ['tp_name' => 'Otros',              'tp_description' => 'Otros description',            'tp_min_matter_enrollment' => '1', 'tp_max_matter_enrollment' => '3', 'tp_num_fees' => '10', 'tp_fees' => '300', 'tp_pay_enrollment' => 0, 'status_id' => 1],
        ]);
    }
}
