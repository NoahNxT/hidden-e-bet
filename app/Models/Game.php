<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'status',
        'match_start',
        'match_end',
        'map',
        'game',
        'tournament_name',
        'tournament_banner',
        'team_i_name',
        'team_i_icon',
        'team_i_factor',
        'team_ii_name',
        'team_ii_icon',
        'team_ii_factor',
    ];

    public function bet_histories(): HasMany
    {
        return $this->hasMany(BetHistory::class);
    }


}
