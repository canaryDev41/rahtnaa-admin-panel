<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(\App\Worker::class, function (Faker $faker) {
    //'name', 'email', 'password', 'city_id', 'phone', 'image', 'rating', 'status', 'national_id_image'
    return [
        'name' => $faker->name('female'),
        'email' => $faker->safeEmail,
        'password' => bcrypt('password'),
        'city_id' => DB::table('cities')->find(rand(1, 3)),
        'phone' => $faker->phoneNumber,
        'image' => null,
        'rating' => rand(1, 60),
        'status' => rand(0, 1),
        'national_id_image' => null
    ];
});
