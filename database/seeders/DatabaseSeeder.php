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
                StatusMaritalSeeder::class,
                TypeDisabilitySeeder::class,
                LanguageSeeder::class,
                ProfileSeeder::class,
                RoleSeeder::class,
                TypeIdentificationSeeder::class,
                UserSeeder::class,
                TypePeriodSeeder::class,
                TypeDaytripSeeder::class,
                TypeReligionSeeder::class,
                EthnicSeeder::class,
                BloodTypeSeeder::class,
                CitySeeder::class,
                TypeInstituteSeeder::class,
                TypeStudentSeeder::class,
                OfferSeeder::class,
                TypeMatterSeeder::class,
                TypeKinshipSeeder::class,
                TypeEducationSeeder::class,
                UserProfileSeeder::class,
                RoleUserProfileSeeder::class,
            ]);
        }
    }
}
