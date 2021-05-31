<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'status',
        'match_start',
        'match_end',
        'map',
    ];

    public function bet_histories(): HasMany
    {
        return $this->hasMany(BetHistory::class);
    }
}
