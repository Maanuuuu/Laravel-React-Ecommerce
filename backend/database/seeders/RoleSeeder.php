<?php

namespace Database\Seeders;

use App\PermissionsEnum;
use App\RolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRole = Role::create(['name' => RolesEnum::user->value]);
        $adminRole = Role::create(['name' => RolesEnum::admin->value]);

        $makeCustomExercisesPermission = Permission::create(['name' => PermissionsEnum::makeCustomExercises->value]);
        $makeExercisesPermission = Permission::create(['name' => PermissionsEnum::makeExercises->value]);
        
        $userRole->syncPermissions([$makeCustomExercisesPermission]);
        $adminRole->syncPermissions([$makeExercisesPermission]);
    }
}
