<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'view-dashboard', 'description' => 'View the dashboard'],
            ['name' => 'edit-dashboard', 'description' => 'Edit dashboard settings'],
            ['name' => 'delete-dashboard', 'description' => 'Delete items from the dashboard'],
            ['name' => 'create-dashboard-item', 'description' => 'Create new items in the dashboard'],
        ];

        Permission::upsert($permissions, ['name'], ['description', 'updated_at']);

        $permissions = Permission::get();
        $company = Company::first();
        $companyRole = Role::create(['name' => 'admin', 'company_id' => $company->id]);
        $companyRole->permissions()->attach($permissions);
        $user = User::whereHas('companies')->first();
        $user->userRolesCompany($company->id)->attach($companyRole);
    }
}
