<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
/*
  数据库迁移
  将标准查询语句,sql语句转化成面向对象的形式
  文档: https://learnku.com/docs/laravel/8.x/migrations/9403
  1 创建迁移文件 php artisan make:migration create_paper_table
  2 up表示前进,批次增加,down表示回滚,批次减小
  3 表实例的可用方法见文档 [可用的字段类型]
  4 创建前移记录表 php artisan migrate:install ,创建了migrations表,三个字段,migration>>前移文件名,batch>>批次号
  5 执行前移时:用迁移文件名去比对迁移记录,如果存在则不执行,否则才执行,并且将处于同一批次号,回滚是恢复到上一批次号,如果文件改名了就找不到了
  6 执行迁移: php artisan migrate
  7 回滚:    php artisan migrate:rollback 只删除记录和回滚,不删除文件
            php artisan migrate:rollback --step=5  默认回滚一次,此处回滚5个批次
*/

class CreatePaperTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    // 依赖注入 表的实例
    Schema::create('paper', function (Blueprint $table) {
      /*
        Id				    表的主键，自增
        Paper_name		试卷名称，唯一，varchar(100)，不为空
        Total_score		试卷总分，整型数字，tinyint，默认为100
        Start_time		试卷开始考试时间，时间戳类型（整型int）
        Duration			考试时间长度，单位分钟，整型tinyint
        Status			  试卷是否启用的状态，1表示启用，2表示禁用，默认为1，tinyint类型
      */

      // id()表示递增 ID（主键），相当于「UNSIGNED BIG INTEGER」
      // $table->id(); 

      // increments() 递增 ID（主键），相当于 UNSIGNED INTEGER
      $table-> increments('id')->comment('自增主键');

      $table->string('paper_name',100)->unique()->comment('试卷名称');

      $table->tinyInteger('total_score')->default(100)->comment('试卷总分');

      $table->integer('start_time')->comment('考试开始时间');

      $table->tinyInteger('duration')->comment('考试时长');

      $table->tinyInteger('status')->default(1)->comment('考试状态');

    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('paper');
  }
}
