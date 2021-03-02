<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// 上面这个是默认自带的,下面的看需求引入
// 可以使用DB类来写数据,旧版本seeder里面可以直接用,现在需要手动引入
use Illuminate\Support\Facades\DB;
// 后面用模型工厂来快速填充
// https://learnku.com/docs/laravel/8.x/database-testing/9416#writing-factories

/*
    Laravel 包含一个填充类可以为你的数据库填充测试数据，所有的填充类都放在 database/seeds 目录下。你可以随意为填充类命名，但是更建议您遵守类似 UserSeeder 的命名规范。通常， Laravel 默认定义了一个 DatabaseSeeder 类。通过这个类，你可以用 call 方法来运行其它的 seed 类从而控制数据填充的顺序。
    https://learnku.com/docs/laravel/8.x/seeding/9404

  1 创建填充器 php artisan make:seeder UserSeeder
  2 在run方法中定义好填充操作,如果用DB填充,需要引入,或者其他方式
  3 执行填充 php artisan db:seed --class=PaperTableSeeder
  注意: 填充器执行没有迁移记录,所以不能回滚,需要手动删除数据



*/
class PaperTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paper')->insert([
          [
            'paper_name'=>'小学开学考试1',
            'total_score'=>'100',
            'start_time'=>time()+86400,
            'duration'=>100,
            'status'=>rand(1,2)
          ],
          [
            'paper_name'=>'小学开学考试2',
            'total_score'=>'100',
            'start_time'=>time()+86400,
            'duration'=>100,
            'status'=>rand(1,2)
          ],
          [
            'paper_name'=>'小学开学考试3',
            'total_score'=>'100',
            'start_time'=>time()+86400,
            'duration'=>100,
            'status'=>rand(1,2)
          ],
        ]);
    }
}
