<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('type_document')->insert([
            ['typ_doc_name' => 'Cédula de identidad', 'typ_doc_description' => NULL, 'keyword' => 'cedu', 'status_id' => 1],
            ['typ_doc_name' => 'Certificado de votación', 'typ_doc_description' => NULL, 'keyword' => 'vota', 'status_id' => 1],
            ['typ_doc_name' => 'Acta de Graduación', 'typ_doc_description' => NULL, 'keyword' => 'grad', 'status_id' => 1],
            ['typ_doc_name' => 'Fotos Carné', 'typ_doc_description' => NULL, 'keyword' => 'foto', 'status_id' => 1],
            ['typ_doc_name' => 'Certificado de Conducta', 'typ_doc_description' => NULL, 'keyword' => 'cond', 'status_id' => 1],
            ['typ_doc_name' => 'Titulo Refrendado', 'typ_doc_description' => NULL, 'keyword' => 'tref', 'status_id' => 1],
            ['typ_doc_name' => 'Recomendación Personal o Laboral', 'typ_doc_description' => NULL, 'keyword' => 'reco', 'status_id' => 1],
            ['typ_doc_name' => 'Carnet de vacunación', 'typ_doc_description' => NULL, 'keyword' => 'vacu', 'status_id' => 1],
        ]);
    }
}
