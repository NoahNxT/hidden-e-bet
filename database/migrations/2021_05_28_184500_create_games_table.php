<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'games',
            function (Blueprint $table) {
                $table->unsignedBigInteger('id')->autoIncrement();
                $table->enum('status', ['Upcoming', 'Warmup', 'Live', 'Ended']);
                $table->datetime('match_start');
                $table->datetime('match_end')->nullable();
                $table->string('map');
                $table->string('game');
                $table->string('tournament_name');
                $table->text('tournament_banner');
                $table->string('team_i_name');
                $table->text('team_i_icon');
                $table->string('team_i_factor');
                $table->string('team_ii_name');
                $table->text('team_ii_icon');
                $table->string('team_ii_factor');
                $table->index('id');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
