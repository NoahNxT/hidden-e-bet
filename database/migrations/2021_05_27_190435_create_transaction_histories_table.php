<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('invoice_id');
            $table->enum('transaction', ['deposit', 'withdraw']);
            $table->float('btc_amount', 9,8);
            $table->float('usd_amount', 9, 8);
            $table->integer('transferred_tokens');
            $table->text('txid')->nullable();
            $table->text('invoice_url');
            $table->enum('status', ['Pending','Paid', 'Underpaid','Overpaid', 'Expired', 'Cancelled']);
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
        Schema::dropIfExists('transaction_histories');
    }
}