<?php

namespace Database\Seeders;

use Database\Factories\PreLoadGameDataFactory;
use Illuminate\Database\Seeder;

class PreLoadGameDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PreLoadGameDataFactory::times(10)->create();
    }
}
