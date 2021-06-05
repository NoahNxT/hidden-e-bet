<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'bet_histories',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('game_id');
                $table->unsignedBigInteger('user_id');
                $table->integer('bet_amount');
                $table->string('bet_team');
                $table->float('bet_factor');
                $table->enum('win_or_lose', ['win', 'lose', 'pending'])->default('pending');
                $table->bigInteger('profit')->nullable();
                $table->timestamps();

                $table->foreign('user_id')
                    ->references('id')
                    ->on('users');

                $table->foreign('game_id')
                    ->references('id')
                    ->on('games')
                ->cascadeOnDelete();
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
        Schema::dropIfExists('bet_histories');
    }
}
