<?php

use Illuminate\Database\Seeder;

class ManagerTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    /*     $faker = \Faker\Factory::create('zh_CN');
    $data = [];
    $data[] = [
      'username' => 'admin',
      'password' => bcrypt('123456'),
      'gender' => rand(1, 3),
      'mobile' => $faker->phoneNumber,
      'email' => $faker->email,
      'role_id' => rand(1, 6),
      'created_at' => date('Y-m-d H:i:s', time()),
      'status' => 2,
    ];
    
    for ($i=0; $i < 100; $i++) { 
      $data[] = [
        'username' => $faker->userName,
        'password' => bcrypt('123456'),
        'gender' => rand(1, 3),
        'mobile' => $faker->phoneNumber,
        'email' => $faker->email,
        'role_id' => rand(1, 6),
        'created_at' => date('Y-m-d H:i:s', time()),
        'status' => rand(1, 2)
      ];
    }

    DB::table('manager')->insert($data); 
  */
  factory(App\Admin\Manager::class, 10)->create();

  }
}
