<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('type_languages')->insert([
            ['typ_lan_name' => 'Español', 'typ_lan_description' => 'Habla idioma español', 'status_id' => 1],
            ['typ_lan_name' => 'Inglés', 'typ_lan_description' => 'Habla idioma inglés', 'status_id' => 1],
            ['typ_lan_name' => 'Francés', 'typ_lan_description' => 'Habla idioma francés', 'status_id' => 1],
            ['typ_lan_name' => 'Chino', 'typ_lan_description' => 'Habla idioma chino mandarin', 'status_id' => 1],
        ]);
    }
}
