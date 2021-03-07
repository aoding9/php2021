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

use Doctrine\DBAL\Types\SmallIntType;

$factory->define(App\Admin\Member::class, function (Faker\Generator $faker) {
    // static $password;

    $faker = Faker\Factory::create('zh_CN');
    return [
      'username' => $faker->userName,
      'password' => bcrypt('123456'),
      'gender' => rand(1, 3),
      'mobile' => $faker->phoneNumber,
      'email' => $faker->email,
      'avatar'=> '/statics/avatar.jpg',
      'created_at' => date('Y-m-d H:i:s', time()),
      'type'=>rand(1,2),
      'status' => rand(1, 2),
    ];
});
