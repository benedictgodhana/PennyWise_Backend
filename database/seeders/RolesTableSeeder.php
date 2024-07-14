<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define roles and assign permissions
        $roles = [
            'admin' => ['manage_users', 'manage_traders', 'view_dashboard', 'create_transactions', 'view_reports'],
            'moderator' => ['view_dashboard', 'create_transactions', 'view_reports'],
            'trader' => ['view_dashboard', 'create_transactions', 'view_savings'],
        ];

        foreach ($roles as $roleName => $permissions) {
            $role = Role::create(['name' => $roleName]);

            // Assign permissions to the role
            foreach ($permissions as $permissionName) {
                $permission = Permission::where('name', $permissionName)->first();
                if ($permission) {
                    $role->givePermissionTo($permission);
                }
            }
        }
    }
}
