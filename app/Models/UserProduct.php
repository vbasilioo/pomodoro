<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProduct extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_id',
        'bought_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function productType()
    {
        return $this->belongsToThrough(ProductType::class, Product::class);
    }
}
