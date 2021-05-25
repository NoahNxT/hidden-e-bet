<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'Noah',
                'email' => 'noah@bet.be',
                'password' => Hash::make('testtest'),
                'tokens' => 100,
                'in_bet_tokens' => 25,
            ]
        );
    }
}
