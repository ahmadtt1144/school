<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'user_id',
        'product_id',
        'checkout_id',
        'quantity',
        'price',
    ];
    public function product()
{
    return $this->belongsTo(Product::class);
}

public function checkout()
{
    return $this->belongsTo(Checkout::class);
}

}
