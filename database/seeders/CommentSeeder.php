<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 26; $i++) {
            Comment::create([
                'content'=> $faker->text($maxNbChars = 200),
                'user_id' => User::inRandomOrder()->first()->id,
                'article_id' => Article::inRandomOrder()->first()->id,
            ]);
    }
}
}
