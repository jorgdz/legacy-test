<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeDisabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('type_disabilities')->insert([
            ['typ_dis_name' => 'Discapacidad Sensorial', 'typ_dis_description' => 'Corresponde  al  tipo  de  personas  que  han  perdido  su  capacidad  visual  o  auditiva  y quienes presentan problemas al momento de comunicarse o utilizar el lenguaje.', 'status_id' => 1],
            ['typ_dis_name' => 'Discapacidad intelectual', 'typ_dis_description' => 'Es aquella  que  presenta  una  serie  de  limitaciones  en  las habilidades  diarias  que  una  persona  aprende  y  le  sirven  para  responder  a  distintas situaciones en la vida. ', 'status_id' => 1],
            ['typ_dis_name' => 'Discapacidad Psíquica', 'typ_dis_description' => 'Es aquella que está directamente relacionada con el comportamiento del individuo.', 'status_id' => 1],
            ['typ_dis_name' => 'Discapacidad Física', 'typ_dis_description' => 'Es aquella que ocurre al faltar o quedar muy poco de una parte del cuerpo, lo cual impide a la persona desenvolverse de la manera convencional.', 'status_id' => 1],
        ]);
    }
}
