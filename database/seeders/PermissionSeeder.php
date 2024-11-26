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
            ['name' => 'view-dashboard', 'description' => 'Permite visualizar a dashboard', 'uuid' => (string) Str::uuid(),],
            ['name' => 'create-dashboard-item', 'description' => 'Permite criar new items in the dashboard', 'uuid' => (string) Str::uuid(),],
        ];

        $adminPermissions = [
            ['name' => 'tenancy-create', 'description' => 'Permite criar novas empresas', 'uuid' => (string) Str::uuid()],
            ['name' => 'tenancy-update', 'description' => 'Permite atualizar dados das empresas', 'uuid' => (string) Str::uuid()],
            ['name' => 'tenancy-delete', 'description' => 'Permite excluir empresa', 'uuid' => (string) Str::uuid()],
            ['name' => 'role-view-row-company-name', 'description' => 'Permite visualizar coluna com o nome da empresa na listagem de cargos', 'uuid' => (string) Str::uuid()],
        ];

        $boothPermissions = [
            ['name' => 'role-view', 'description' => 'Permite visualizar listagem de cargos geral', 'uuid' => (string) Str::uuid()],
            ['name' => 'role-create', 'description' => 'Permite criar novos cargos', 'uuid' => (string) Str::uuid()],
            ['name' => 'role-update', 'description' => 'Permite atualizar cargos', 'uuid' => (string) Str::uuid()],
            ['name' => 'role-delete', 'description' => 'Permite excluir cargos', 'uuid' => (string) Str::uuid()],
            ['name' => 'user-view', 'description' => 'Permite ver listagem de usuários', 'uuid' => (string) Str::uuid()],
            ['name' => 'user-create', 'description' => 'Permite criar usuários', 'uuid' => (string) Str::uuid()],
            ['name' => 'user-update', 'description' => 'Permite atualizar usuários', 'uuid' => (string) Str::uuid()],
            ['name' => 'user-delete', 'description' => 'Permite excluir usuários', 'uuid' => (string) Str::uuid()],
        ];

        $allPermissions = array_merge($permissions, $adminPermissions, $boothPermissions);

        Permission::upsert($allPermissions, ['name'], ['description', 'updated_at']);

        $categoryCompany = Category::where('name', 'company')->first();
        collect(array_merge($permissions, $boothPermissions))->pluck('name')->each(function ($permission) use ($categoryCompany) {
            $categoryCompany->permissions()->attach(Permission::where('name', $permission)->first()->id);
        });

        $categorySystem = Category::where('name', 'system')->first();
        collect(array_merge($adminPermissions, $boothPermissions))->pluck('name')->each(function ($permission) use ($categorySystem) {
            $categorySystem->permissions()->attach(Permission::where('name', $permission)->first()->id);
        });
    }
}
