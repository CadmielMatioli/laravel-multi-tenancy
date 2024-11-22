<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder {

    public function run(): void {

        $roleAdmin = Role::updateOrCreate(
            [
                'uuid' => (string) Str::uuid()
            ],
            [
                'name' => 'Administrador Geral'
            ]
        );

        $roleCompanyOne = Role::updateOrCreate(
            [
                'uuid' => (string) Str::uuid()
            ],
            [
                'name' => 'Gestor',
                'company_id' => 1
            ]
        );

        $roleCompanyTwo = Role::updateOrCreate(
            [
                'uuid' => (string) Str::uuid()
            ],
            [
                'name' => 'Gestor',
                'company_id' => 2
            ]
        );


        $companyPermissions = Permission::whereHas('categories', function ($query) {
            $query->where('name', 'company');
        });

        $allPermissions = Permission::all();

        $roleAdmin->permissions()->attach($allPermissions);
        $roleCompanyOne->permissions()->attach($companyPermissions->get());
        $roleCompanyTwo->permissions()->attach($companyPermissions->get());

        $companyOne = Company::find(1);
        $companyTwo = Company::find(2);

        $userSystem = User::find(2);
        $userSystem->roles()->attach($roleAdmin);
        $userCompany1 = User::find(3);
        $userCompany1->userRolesCompany($companyOne->id)->attach($roleCompanyOne);
        $userCompany1 = User::find(4);
        $userCompany1->userRolesCompany($companyOne->id)->attach($roleCompanyOne);
        $userCompany2 = User::find(5);
        $userCompany2->userRolesCompany($companyTwo->id)->attach($roleCompanyTwo);
    }
}
