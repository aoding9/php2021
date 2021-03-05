<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('role',function(Blueprint $table){
          $table->increments('id');
          $table->string('role_name',20)->notNull()->comment('角色名称');
          $table->text('auth_ids')->comment('权限id集合');
          $table->text('auth_ac')->comment('权限控制器和方法组合');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('role');
    }
}
