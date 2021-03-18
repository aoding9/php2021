<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* 
        profiles
            id      - integer 
            user_id - integer 
            age     - string
            gender  - string
     */
        Schema::create('profiles', function (Blueprint $table) {
            // $table->id();
            $table->increments('id');
            $table->integer('user_id');
            $table->string('age');
            $table->tinyInteger('gender');
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
        Schema::dropIfExists('profiles');
    }
}
