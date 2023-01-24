<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cart_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function pizzas()
    // {
    //     return $this->belongsToMany(Pizza::class, 'book_orders', 'order_id', 'book_id');
    // }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
