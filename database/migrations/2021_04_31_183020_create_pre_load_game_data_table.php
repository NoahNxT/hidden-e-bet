<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreLoadGameDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_load_game_data', function (Blueprint $table) {
            $table->id();
            $table->integer('game_id')->unique()->nullable();
            $table->json('data');
            $table->timestamps();

            $table->index('game_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_load_game_data');
    }
}
