<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('users')->insert([
            [
                'us_username' => env('LEGACY_USERNAME', 'phoppe'),
                'email' => env('LEGACY_EMAIL', 'pepo@gmail.com'),
                'password' => env('LEGACY_PASSWORD', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
                'person_id' => 1,
                'status_id' => 1,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ], [
                'us_username' => env('ADMIN_USERNAME', 'jelly'),
                'email' => env('ADMIN_EMAIL', 'jelly@gmail.com'),
                'password' => env('ADMIN_PASSWORD', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
                'person_id' => 2,
                'status_id' => 1,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        ]);
    }
}
