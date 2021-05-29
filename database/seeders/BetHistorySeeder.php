<?php

namespace Database\Seeders;

use Database\Factories\BetHistoryFactory;
use Database\Factories\TransactionHistoryFactory;
use Illuminate\Database\Seeder;

class BetHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BetHistoryFactory::times(100)->create();

    }
}
