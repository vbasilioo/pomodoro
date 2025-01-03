<?php

namespace App\Models\User;

use App\Models\Marketplace\Product;
use App\Models\Marketplace\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProduct extends Model
{
    use SoftDeletes;

    protected $table = 'user_products';

    protected $fillable = [
        'user_id',
        'product_id',
        'bought_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function productType()
    {
        return $this->belongsToThrough(Type::class, Product::class);
    }
}
