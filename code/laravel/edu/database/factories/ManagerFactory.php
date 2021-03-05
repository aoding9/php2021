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
$factory->define(App\Admin\Manager::class, function (Faker\Generator $faker) {
    static $password;

    return [
      'username' => $faker->userName,
      'password' => bcrypt('123456'),
      'gender' => rand(1, 3),
      'mobile' => $faker->phoneNumber,
      'email' => $faker->email,
      'role_id' => rand(1, 6),
      'created_at' => date('Y-m-d H:i:s', time()),
      'status' => rand(1, 2)
    ];
});
