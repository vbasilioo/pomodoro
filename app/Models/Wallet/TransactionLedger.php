<?php

namespace App\Models\Wallet;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionLedger extends Model
{
    use SoftDeletes;
    
    protected $table = 'transaction_ledgers';

    protected $fillable = [
        'transaction_id',
        'user_id',
        'type',
        'amount',
    ];

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
