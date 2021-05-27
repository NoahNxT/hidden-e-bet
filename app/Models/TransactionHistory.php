<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'invoice_id',
        'transaction',
        'btc_amount',
        'usd_amount',
        'transferred_tokens',
        'txid',
        'invoice_url',
        'status',
    ];
}
