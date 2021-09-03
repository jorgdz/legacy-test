<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'us_identification' => 0000000000,
            'us_firstname' => 'pepe',
            'us_first_lastname' => 'pepo',
            'us_date_birth' => date('1996-10-5'),
            'us_gender' => 'Masculino',
            'us_username' => 'phoppe',
            'email' => 'pepo@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
            'type_identification_id' => 1,
            'status_id' => 1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'us_identification' => 0000000000,
            'us_firstname' => 'jelly',
            'us_first_lastname' => 'jollay',
            'us_date_birth' => date('1997-03-10'),
            'us_gender' => 'Femenino',
            'us_username' => 'jelly',
            'email' => 'jelly@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
            'type_identification_id' => 1,
            'status_id' => 1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        //User::factory(20000)->create();
    }
}
