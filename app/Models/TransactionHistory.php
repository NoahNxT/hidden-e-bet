<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


/**
 * App\Models\TransactionHistory
 *
 * @property int $id
 * @property int $user_id
 * @property string $invoice_id
 * @property string $transaction
 * @property float $btc_amount
 * @property float $usd_amount
 * @property int $transferred_tokens
 * @property string|null $txid
 * @property string $invoice_url
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereBtcAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereInvoiceUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereTransaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereTransferredTokens($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereTxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereUsdAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereUserId($value)
 * @mixin \Eloquent
 */
class TransactionHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'invoice_id',
        'transaction',
        'tcn_amount',
        'usd_amount',
        'transferred_tokens',
        'txid',
        'invoice_url',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
