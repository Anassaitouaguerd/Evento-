<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'manage_event']);
        Permission::create(['name' => 'manage_user']);
        Permission::create(['name' => 'manage_category']);
        Permission::create(['name' => 'validate_event']);
        Permission::create(['name' => 'validate_ticket']);
        Permission::create(['name' => 'admine_statistique']);
        Permission::create(['name' => 'organisateur_statistique']);
    }
}
