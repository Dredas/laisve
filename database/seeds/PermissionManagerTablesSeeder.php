<?php

use Backpack\PermissionManager\app\Models\Permission;
use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Database\Seeder;

class PermissionManagerTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'superadmin', 'guard_name' => 'web'])->users()->sync([1]);
        Role::create(['name' => 'admin', 'guard_name' => 'web']);
        Role::create(['name' => 'member', 'guard_name' => 'web']);

        Permission::create(['name' => 'maps', 'guard_name' => 'web'])->roles()->sync([1]);
        Permission::create(['name' => 'logs', 'guard_name' => 'web'])->roles()->sync([1]);
    }
}
