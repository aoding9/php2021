<?php

use Illuminate\Database\Seeder;

class AuthTableSeeder extends Seeder
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
      ['id'=>1,'auth_name' => '管理员管理', 'pid' => 0],
      ['id'=>2,'auth_name' => '管理员列表', 'pid' => 1,'controller','ManagerController','action'=>'index'],
      ['id'=>3,'auth_name' => '角色列表', 'pid' => 1,'controller','RoleController','action'=>'index'],
      ['id'=>4,'auth_name' => '权限列表', 'pid' => 1,'controller','AuthController','action'=>'index'],

      ['id'=>5,'auth_name' => '会员管理', 'pid' => 0],
      ['id'=>6,'auth_name' => '会员列表', 'pid' => 5,'controller','MemberController','action'=>'index'],
      ['id'=>7,'auth_name' => '试卷管理', 'pid' => 0],
    ];
    foreach ($data as $value) {
      DB::table('auth')->insert($value);
    }
  }
}
