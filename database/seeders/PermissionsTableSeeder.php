<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage_users',
            'manage_traders',
            'view_dashboard',
            'create_transactions',
            'view_reports',
            'access_financial_education',
            'create_savings',
            'edit_savings',
            'delete_savings',
            'view_savings',
            'approve_savings',
            'reject_savings',
            // Add more permissions as needed
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
