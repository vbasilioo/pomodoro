<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_type_id',
        'price',
    ];

    public function productType(){
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }
}
