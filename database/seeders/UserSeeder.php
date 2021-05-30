<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
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
                'username' => 'Flooxio',
                'password' => Hash::make('testtest'),
                'tokens' => 100,
                'in_bet_tokens' => 25,
            ]);

        UserFactory::times(100)->create();

    }
}
