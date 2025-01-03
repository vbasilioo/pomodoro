<?php

namespace App\Models\Marketplace;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'product_type_id',
        'name',
        'price',
        'context',
    ];

    protected $casts = [
        'price' => 'double',
        'context' => 'json',
    ];

    public function productType(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'product_type_id', 'id');
    }
}
