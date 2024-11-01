<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::upsert([
            [
                'cnpj' => '12345678912345',
                'uuid' => (string) Str::orderedUuid(),
                'name' => 'Teste'
            ],
            [
                'cnpj' => '123456789123454',
                'uuid' => (string) Str::orderedUuid(),
                'name' => 'Teste',
            ]
        ], 'cnpj', ['name', 'uuid']);
    }
}
