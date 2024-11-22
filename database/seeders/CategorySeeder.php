<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'company', 'description' => 'Roles only for companies', 'uuid' => (string) Str::uuid(),],
            ['name' => 'system', 'description' => 'Roles only for the system', 'uuid' => (string) Str::uuid(),],
        ];
        Category::upsert($categories, ['name'], ['description', 'updated_at']);
    }
}
