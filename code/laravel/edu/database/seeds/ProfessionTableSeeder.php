<?php

use Illuminate\Database\Seeder;

class ProfessionTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('profession')->insert([
      'pro_name'    =>  'php基础班',
      'protype_id'  =>  '1',
      'teachers_ids'  =>  '3,4,6,9',
      'created_at'  =>   date('Y-m-d H:i:s'),
      'duration'    =>  18,
      'cover_img'    =>  '/statics/avatar.jpg',
      'price'      =>  '100.00'
    ]);
    DB::table('profession')->insert([
      'pro_name'    =>  'php就业班',
      'protype_id'  =>  '1',
      'teachers_ids'  =>  '10,12,15,16',
      'created_at'  =>   date('Y-m-d H:i:s'),
      'duration'    =>  98,
      'cover_img'    =>  '/statics/avatar.jpg',
      'price'      =>  '200.00'
    ]);
    DB::table('profession')->insert([
      'pro_name'    =>  '前端基础班',
      'protype_id'  =>  '2',
      'teachers_ids'  =>  '17,18,1921',
      'created_at'  =>   date('Y-m-d H:i:s'),
      'duration'    =>  90,
      'cover_img'    =>  '/statics/avatar.jpg',
      'price'      =>  '100.00'
    ]);
  }
}
