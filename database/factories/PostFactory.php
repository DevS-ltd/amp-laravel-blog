<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'annotation' => $faker->paragraph,
        'content' => $faker->text(10000),
        'user_id' => User::inRandomOrder()->first()->id,
    ];
});

$factory->afterCreating(Post::class, function ($post, $faker) {
    $post->categories()->attach(Category::inRandomOrder()->first());
    $post->addMediaFromUrl($faker->imageUrl())->toMediaCollection(Post::PREVIEW);
});
