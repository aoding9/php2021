<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // $faker = \Faker\Factory::create('zh_CN');
    factory(App\Admin\Member::class, 100)->create();
  }
}
