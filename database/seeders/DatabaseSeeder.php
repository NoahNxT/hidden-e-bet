<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                UserSeeder::class,
                TransactionHistorySeeder::class,
                GameSeeder::class,
                PreLoadGameDataSeeder::class,
                BetHistorySeeder::class,
            ]
        );
    }
}
