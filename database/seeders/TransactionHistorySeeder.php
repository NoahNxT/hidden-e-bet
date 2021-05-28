<?php

namespace Database\Seeders;

use Coinremitter\Coinremitter;
use Database\Factories\TransactionHistoryFactory;
use Illuminate\Database\Seeder;

class TransactionHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 28200; $x <= 28210; $x++) {
            TransactionHistoryFactory::times(1)->withX($x)->create();
        }
    }
}
