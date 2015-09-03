<?php

$factory->define(CodeCommerce\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CodeCommerce\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
    ];
});

$factory->define(CodeCommerce\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->randomFloat(2,0,3000),
        'featured' => $faker->boolean,
        'recommend' => $faker->boolean,
        'category_id' => $faker->numberBetween(1,15)
    ];
});

$factory->define(CodeCommerce\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});
