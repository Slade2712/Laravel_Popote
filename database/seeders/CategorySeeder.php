<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Entrée']);
        Category::create(['name' => 'Plat principal']);
        Category::create(['name' => 'Dessert']);
        Category::create(['name' => 'Végétarien']);
        Category::create(['name' => 'Sans Gluten']);
    }
}
