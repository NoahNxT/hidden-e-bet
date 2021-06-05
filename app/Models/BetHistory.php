<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BetHistory extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'game_id',
            'user_id',
            'bet_amount',
            'bet_team',
            'bet_factor',
            'win_or_lose',
            'profit',

        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game() : belongsTo
    {
        return $this->belongsTo(Game::class);
    }
}
