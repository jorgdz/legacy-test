<?php

namespace Database\Seeders;

use App\Models\ClassroomType;
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
                CatalogSeeder::class,
                TypeDisabilitySeeder::class,
                EntryTypeSeed::class,
                MentionSeeder::class,
                ProfileSeeder::class,
                RoleSeeder::class,
                TypePeriodSeeder::class,
                SimbologySeeder::class,
                BloodTypeSeeder::class,
                TypeInstituteSeeder::class,
                TypeStudentSeeder::class,
                OfferSeeder::class,
                TypeCriteriaSeeder::class,
                TypeMatterSeeder::class,
                TypeEducationSeeder::class,
                PersonSeeder::class,
                UserSeeder::class,
                UserProfileSeeder::class,
                RoleUserProfileSeeder::class,
                StudentSeeder::class,
                ClassroomTypeSeeder::class,
                DepartmentSeeder::class,
                PositionSeeder::class,
                AreasSeeder::class,
            ]);
        }
    }
}
