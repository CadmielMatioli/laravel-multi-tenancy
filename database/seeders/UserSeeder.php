<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::updateOrCreate([
            'name' => 'teste',
            'email' => 'teste@teste.com',
            'password' => bcrypt('123456')
        ]);

    }
}
