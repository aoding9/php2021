<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* 
        movies
            id          - integer
            title       - string
            director    - integer
            describe    - string
            rate        - tinyint
            released    - enum(0, 1)
            release_at  - timestamp
            created_at  - timestamp
            updated_at  - timestamp
        */
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);
            $table->integer('director');
            $table->string('describe',255);
            $table->tinyInteger('rate');
            $table->enum('released',[0,1]);
            $table->timestamp('release_at')->default(NULL);
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
        Schema::dropIfExists('movies');
    }
}
