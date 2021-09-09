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
            'us_username' => env('LEGACY_USERNAME', 'phoppe'),
            'email' => env('LEGACY_EMAIL', 'pepo@gmail.com'),
            'password' => env('LEGACY_PASSWORD', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'), // password,
            'status_id' => 1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        
        User::factory()->create([
            'us_username' => 'jelly',
            'email' => 'jelly@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
            'status_id' => 1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        //User::factory(20000)->create();
    }
}
