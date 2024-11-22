<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run(): void
    {
        $this->call([
            CompanySeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class
        ]);
    }
}
