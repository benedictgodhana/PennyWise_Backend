<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersRolesPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define users with their respective roles and permissions
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'roles' => ['admin'],
                'permissions' => [],
            ],
            [
                'name' => 'Moderator User',
                'email' => 'moderator@example.com',
                'password' => bcrypt('password'),
                'roles' => ['moderator'],
                'permissions' => [],
            ],
            [
                'name' => 'Trader User',
                'email' => 'trader@example.com',
                'password' => bcrypt('password'),
                'roles' => ['trader'],
                'permissions' => [],
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);

            // Assign roles to the user
            foreach ($userData['roles'] as $roleName) {
                $role = Role::where('name', $roleName)->first();
                if ($role) {
                    $user->assignRole($role);
                }
            }

            // Assign permissions directly to the user if needed
            foreach ($userData['permissions'] as $permissionName) {
                $permission = Permission::where('name', $permissionName)->first();
                if ($permission) {
                    $user->givePermissionTo($permission);
                }
            }
        }
    }
}
