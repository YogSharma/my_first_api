<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'details'=>$faker->paragraph,
        'price'=>$faker->numberBetween(100, $max = 3000),
        'stock'=>$faker->randomDigit,
        'discount'=>$faker->numberBetween(2, 30),
        'user_id'=>function(){
            return \App\User::all()->random();
        },
    ];
});
