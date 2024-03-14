<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Article;
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
        $faker = Factory::create();
        $categories = ['Sport', 'IT', 'Sciences', 'Physic'];

        for ($i = 0; $i < count($categories); $i++) {
            Category::create([
                'label'=> $categories[$i]
            ]);
        }
    }
}
