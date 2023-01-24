<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'isProcessed',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'cart_pizzas')->withPivot('topping_id', 'size_id', 'price', 'quanlity');
    }
    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
