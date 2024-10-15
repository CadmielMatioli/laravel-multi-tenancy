<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

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
                'name' => 'Teste'
            ],
            [
                'cnpj' => '123456789123454',
                'name' => 'Teste',
            ]
        ], 'cnpj');
    }
}
