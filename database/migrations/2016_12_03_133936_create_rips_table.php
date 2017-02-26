<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('url')->unique();
            $table->string('place');
            $table->string('enemy');
            $table->unsignedTinyInteger('level_of_stupidness');

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
        Schema::dropIfExists('rips');
    }
}
