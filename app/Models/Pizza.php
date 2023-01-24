<?php

namespace App\Models;

use App\Models\CartPizza;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'url',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function orders()
    // {
    //     return $this->belongsToMany(Order::class, 'book_orders', 'book_id', 'order_id');
    // }
}
