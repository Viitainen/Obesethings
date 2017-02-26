<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerRipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_rip', function(Blueprint $table) {
            $table->integer('player_id')->unsigned()->nullable();
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->integer('rip_id')->unsigned()->nullable();
            $table->foreign('rip_id')->references('id')->on('rips')->onDelete('cascade');
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
        Schema::dropIfExists('player_rip');
    }
}
