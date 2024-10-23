<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'checkouts';

    protected $fillable = [
        'email', 
        'country', 
        'first_name', 
        'last_name', 
        'address', 
        'city', 
        'postal_code', 
        'phone', 
        'save_info',
        'user_id', 
        'order_no'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function products()
    {
        return $this->hasManyThrough(
            Product::class, 
            Cart::class, 
            'user_id', 
            'id', 
            // 'user_id', 
            'product_id'
        );
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id', 'id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
