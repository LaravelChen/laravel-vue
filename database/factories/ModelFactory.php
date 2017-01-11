<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'avatar'=>'picture/default.png',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    $user_ids = \App\User::pluck('id')->random();
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id'=>$user_ids ,
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    $user_ids = \App\User::pluck('id')->random();
    $article_ids = \App\Article::pluck('id')->random();
    return [
        'user_id'=>$user_ids,
        'body' => $faker->sentence,
        'article_id'=>$article_ids ,
    ];
});
