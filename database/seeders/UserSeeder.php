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
                'password' => '$2y$10$WBdMb5jSMGV/zpgF4R0eAeoPDDtQuAggvhapRzWF1vMMEpWdC9n5K', //testtest
                'tokens' => 1000,
                'in_bet_tokens' => 0,
                'withdraw_key' => 'RFeC75srdfxaf4FD4KS7PmQx7D1f7FCibJ',
            ]);

        UserFactory::times(100)->create();

    }
}
