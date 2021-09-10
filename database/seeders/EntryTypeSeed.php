<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntryTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('entry_types')->insert([
            ['ent_ty_name' => 'Ingreso por admisiones',  'ent_ty_description' => '',     'ent_ty_acronym' => 'adm'],
            ['ent_ty_name' => 'Ingreso por movilidad',  'ent_ty_description' => '',     'ent_ty_acronym' => 'mov'],
            ['ent_ty_name' => 'Nivelación',  'ent_ty_description' => '',     'ent_ty_acronym' => 'niv'],
        ]);
    }
}
