<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreLoadGameData extends Model
{
    use HasFactory;

    protected $fillable = [
      'match_id',
      'data'
    ];
}