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
                CategoryStatusSeeder::class,
                StatusSeeder::class,
                CompanySeeder::class,
                CampusSeeder::class,
                ModalitySeeder::class,
                CatalogSeeder::class,
                StatusMaritalSeeder::class,
                TypeDisabilitySeeder::class,
                EntryTypeSeed::class,
                LanguageSeeder::class,
                MentionSeeder::class,
                ProfileSeeder::class,
                RoleSeeder::class,
                TypeIdentificationSeeder::class,
                TypePeriodSeeder::class,
                SimbologySeeder::class,
                TypeDaytripSeeder::class,
                TypeReligionSeeder::class,
                EthnicSeeder::class,
                BloodTypeSeeder::class,
                CitySeeder::class,
                TypeInstituteSeeder::class,
                TypeStudentSeeder::class,
                OfferSeeder::class,
                TypeCriteriaSeeder::class,
                TypeMatterSeeder::class,
                TypeKinshipSeeder::class,
                TypeEducationSeeder::class,
                SectorSeeder::class,
                PersonSeeder::class,
                UserSeeder::class,
                UserProfileSeeder::class,
                RoleUserProfileSeeder::class,
                StudentSeeder::class
            ]);
        }
    }
}
