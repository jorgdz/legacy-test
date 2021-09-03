<?php

namespace Database\Seeders;

use App\Models\CustomTenant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (CustomTenant::checkCurrent()) {
            $this->call([
                StatusSeeder::class,
                ProfileSeeder::class,
                RoleSeeder::class,
                TypeIdentificationSeeder::class,
                UserSeeder::class
            ]);

            $this->call([
                UserProfileSeeder::class,
                RoleUserProfileSeeder::class,
            ]);
        }
    }
}
