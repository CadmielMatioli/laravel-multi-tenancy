<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder {

    public function run(): void {
        User::upsert([
            [
                'name' => 'Root',
                'email' => 'root@root.com',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'is_admin' => true,
                'uuid' => (string) Str::uuid(),
                'password' => bcrypt('root@root.com')
            ],
            [
                'name' => 'No Root',
                'email' => 'noroot@noroot.com',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'is_admin' => false,
                'uuid' => (string) Str::uuid(),
                'password' => bcrypt('noroot@noroot.com')
            ],
            [
                'name' => 'Funcionário 1',
                'email' => 'funcionario1@empresa1.com',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'is_admin' => false,
                'uuid' => (string) Str::uuid(),
                'password' => bcrypt('funcionario1@empresa1.com')
            ],
            [
                'name' => 'Funcionário 2',
                'email' => 'funcionario2@empresa1.com',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'is_admin' => false,
                'uuid' => (string) Str::uuid(),
                'password' => bcrypt('funcionario2@empresa1.com')
            ],
            [
                'name' => 'Funcionário 1',
                'email' => 'funcionario1@empresa2.com',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'is_admin' => false,
                'uuid' => (string) Str::uuid(),
                'password' => bcrypt('funcionario1@empresa2.com')
            ]
        ], 'email');

        $user = User::where('email', 'funcionario1@empresa1.com')->first();
        $user->companies()->attach(1);
        $user = User::where('email', 'funcionario2@empresa1.com')->first();
        $user->companies()->attach(1);
        $user->companies()->attach(2);
        $user = User::where('email', 'funcionario1@empresa2.com')->first();
        $user->companies()->attach(2);

    }
}
