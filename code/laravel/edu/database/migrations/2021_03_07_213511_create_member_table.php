<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('member',function($table){
        $table -> increments('id'); 
        $table -> string('username',20) -> notNull();
        $table -> string('password') -> notNull();
        $table -> enum('gender',[1,2,3]) -> nutNull() -> default('1');
        $table -> string('mobile',11);
        $table -> string('email',40);
        $table -> string('avatar');
        $table -> timestamps();
        $table -> rememberToken();
        $table -> enum('type',[1,2]) -> notNull() -> default('1');
        $table -> enum('status',[1,2]) -> notNull() -> default('2');
        $table->smallInteger('country_id')->comment('国家id');
        $table->smallInteger('province_id')->comment('省/州id');
        $table->smallInteger('city_id')->comment('城市id');
        $table->smallInteger('county_id')->comment('区县id');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
}
