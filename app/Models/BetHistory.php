<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BetHistory extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'match_id',
            'user_id',
            'bet_amount',
            'bet_team',
            'bet_factor',
            'win_or_lose',
            'profit',

        ];
}
