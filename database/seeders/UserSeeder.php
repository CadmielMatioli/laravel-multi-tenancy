<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder {

    public function run(): void {
        User::upsert([
            [
                'name' => 'teste',
                'email' => 'teste@teste.com',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'is_admin' => true,
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'noAdmin',
                'email' => 'noAdmin@noAdmin.com',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'is_admin' => false,
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'empresa',
                'email' => 'empresa@empresa.com',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'is_admin' => false,
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'empresa 1',
                'email' => 'empresa1@empresa.com',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'is_admin' => false,
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'empresa 2',
                'email' => 'empresa2@empresa.com',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'is_admin' => false,
                'password' => bcrypt('123456')
            ]
        ], 'email');


        $user = User::where('email', 'empresa@empresa.com')->first();
        $user->companies()->attach(1);
        $user = User::where('email', 'empresa1@empresa.com')->first();
        $user->companies()->attach(1);
        $user = User::where('email', 'empresa2@empresa.com')->first();
        $user->companies()->attach(2);

    }
}
