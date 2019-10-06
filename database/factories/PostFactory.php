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
        'published' => true,
    ];
});

$factory->afterCreating(Post::class, function ($post, $faker) {
    $post->categories()->attach(Category::inRandomOrder()->first());
    $width = 800;
    $height = 600;
    $conversions = config('media.conversions');
    if (in_array('large', $conversions)) {
        $width = config('media.image_sizes.large.width');
        $height = config('media.image_sizes.large.height');
    }
    $post->addMediaFromUrl($faker->imageUrl($width, $height))->toMediaCollection(Post::PREVIEW);
});
