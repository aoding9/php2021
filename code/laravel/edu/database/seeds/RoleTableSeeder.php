<?php

use Illuminate\Database\Seeder;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
          ['role_name' => '老板'],
          ['role_name' => '主管'],
          ['role_name' => '组长'],
          ['role_name' => '打工人'],
          ['role_name' => '保安'],
          ['role_name' => '保洁'],
        ];
        foreach ($data as $value) {
          DB::table('role')->insert($value);
        }
    
    }
}
