<?php

use App\Tag;
use App\Article;
use Faker\Generator;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);

        $tags = Tag::pluck('id')->toArray();

        factory(Article::class, 20)->create()->each(function ($article, $index) use ($faker, $tags) {
            $article->tags()->sync($faker->randomElements($tags, $faker->numberBetween(1, count($tags))));
        });
    }
}
