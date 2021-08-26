<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('roles')->insert([
            ['name' => 'SuperAdministrador', 'description' => 'Usuario superadministrador', 'guard_name' => 'api', 'status_id' => 1],
        ]);
        
        DB::connection('tenant')->table('permissions')->insert([
            ['name' => 'list_modules', 'description' => 'Lorem ipsum dolor sit amet.', 'guard_name' => 'api', 'status_id' => 1],
        ]);
        
        DB::connection('tenant')->table('role_has_permissions')->insert([
            ['permission_id' => 1, 'role_id' => 1],
        ]);
    }
}
