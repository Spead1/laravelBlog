<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $faker = Factory::create();
        for ($i = 0; $i < 26; $i++) {
            Article::create([
                'title' => $faker->sentence(),
                'subtitle' => $faker->sentence(),
                'content'=> $faker->text($maxNbChars = 600),
                'category_id' => Category::inRandomOrder()->first()->id,
            ]);
    };
}

}
