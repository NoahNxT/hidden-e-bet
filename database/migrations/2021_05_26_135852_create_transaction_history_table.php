<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'transaction_history',
            function (Blueprint $table) {
                $table->id();
                $table->integer('user_id');
                $table->enum('transaction', ['deposit', 'withdraw']);
                $table->float('btc_amount');
                $table->float('usd_amount');
                $table->integer('tokens_amount');
                $table->text('txid');
                $table->text('explorer_url');
                $table->enum('status', ['Pending','Paid', 'Underpaid','Overpaid', 'Expired', 'Cancelled']);
                $table->timestamps();
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
        Schema::dropIfExists('transaction_history');
    }
}
