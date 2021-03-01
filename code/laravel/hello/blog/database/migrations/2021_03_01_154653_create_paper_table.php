<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
/*
  数据库迁移
  文档: https://learnku.com/docs/laravel/8.x/migrations/9403
  创建迁移文件 php artisan make:migration create_paper_table
  up表示建表方法,down是删表方法
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
            $table->id();
            $table->timestamps();
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
