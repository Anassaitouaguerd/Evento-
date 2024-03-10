<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $AdminRole = Role::findByName('admin');
        $OrganisateurRole = Role::findByName('organisateur');
        # part admin
        $AdminRole->givePermissionTo('manage_user');
        $AdminRole->givePermissionTo('mamage_category');
        $AdminRole->givePermissionTo('validate_event');
        $AdminRole->givePermissionTo('admine_statistique');
        # part organisateur
        $OrganisateurRole->givePermissionTo('manage_event');
        $OrganisateurRole->givePermissionTo('validate_ticket');
        $OrganisateurRole->givePermissionTo('organisateur_statistique');
    }
}
