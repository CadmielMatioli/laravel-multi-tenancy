<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'view-dashboard', 'description' => 'View the dashboard', 'uuid' => (string) Str::orderedUuid(),],
            ['name' => 'edit-dashboard', 'description' => 'Edit dashboard settings', 'uuid' => (string) Str::orderedUuid(),],
            ['name' => 'delete-dashboard', 'description' => 'Delete items from the dashboard', 'uuid' => (string) Str::orderedUuid(),],
            ['name' => 'create-dashboard-item', 'description' => 'Create new items in the dashboard', 'uuid' => (string) Str::orderedUuid(),],
        ];

        Permission::upsert($permissions, ['name'], ['description', 'updated_at']);

        $permissions = Permission::get();
        $company = Company::first();
        $companyRole = Role::create(['name' => 'admin', 'company_id' => $company->id, 'uuid' => (string) Str::orderedUuid()]);
        $companyRole->permissions()->attach($permissions);
        $user = User::whereHas('companies')->first();
        $user->userRolesCompany($company->id)->attach($companyRole);
    }
}
