<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Permission;
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
            ['name' => 'view-dashboard', 'description' => 'View the dashboard', 'uuid' => (string) Str::uuid(),],
            ['name' => 'edit-dashboard', 'description' => 'Edit dashboard settings', 'uuid' => (string) Str::uuid(),],
            ['name' => 'delete-dashboard', 'description' => 'Delete items from the dashboard', 'uuid' => (string) Str::uuid(),],
            ['name' => 'create-dashboard-item', 'description' => 'Create new items in the dashboard', 'uuid' => (string) Str::uuid(),],
        ];

        $adminPermissions = [
            ['name' => 'tenancy-create', 'description' => 'Create new items in the tenancy', 'uuid' => (string) Str::uuid(),],
            ['name' => 'tenancy-update', 'description' => 'Update new items in the tenancy', 'uuid' => (string) Str::uuid(),],
            ['name' => 'tenancy-delete', 'description' => 'Delete new items in the tenancy', 'uuid' => (string) Str::uuid(),],
            ['name' => 'role-create', 'description' => 'Create new items in the roles', 'uuid' => (string) Str::uuid(),],
            ['name' => 'role-update', 'description' => 'Update new items in the roles', 'uuid' => (string) Str::uuid(),],
            ['name' => 'role-delete', 'description' => 'Delete new items in the roles', 'uuid' => (string) Str::uuid(),],
            ['name' => 'role-view-row-company-name', 'description' => 'Role view row company name on row list', 'uuid' => (string) Str::uuid(),],
        ];

        $allPermissions = array_merge($permissions, $adminPermissions);

        Permission::upsert($allPermissions, ['name'], ['description', 'updated_at']);

        $categoryCompany = Category::where('name', 'company')->first();
        collect($permissions)->pluck('name')->each(function ($permission) use ($categoryCompany) {
            $categoryCompany->permissions()->attach(Permission::where('name', $permission)->first()->id);
        });

        $categorySystem = Category::where('name', 'system')->first();
        collect($adminPermissions)->pluck('name')->each(function ($permission) use ($categorySystem) {
            $categorySystem->permissions()->attach(Permission::where('name', $permission)->first()->id);
        });
    }
}
