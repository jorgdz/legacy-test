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
                ModuleSeeder::class,
                DirectorySeeder::class,
                ActionSeeder::class,
                TypeIdentificationSeeder::class,
            ]);

            \App\Models\User::factory(1)->create();

            $this->call([
                UserProfileSeeder::class,
                RoleUserProfileSeeder::class,
            ]);
        }
    }
}
