<?php

namespace Database\Seeders;

use App\Models\User;
use App\RolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@test.com',
        ])-> assignRole(RolesEnum::user->value);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
        ])-> assignRole(RolesEnum::admin->value);
    }
}
