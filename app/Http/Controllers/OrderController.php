<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::join('cart_pizzas', 'orders.cart_id', "=", 'cart_pizzas.cart_id')
            ->join('pizzas', 'cart_pizzas.pizza_id', "=", 'pizzas.id')
            ->join('sizes', 'sizes.id', "=", 'cart_pizzas.size_id')
            ->select('orders.created_at as date', 'cart_pizzas.*', 'pizzas.url', 'pizzas.title as pizza_name', 'sizes.name as pizza_size', DB::raw("IF(`cart_pizzas`.`topping_id` IS NOT NULL, (SELECT name FROM toppings WHERE `toppings`.`id` = `cart_pizzas`.`topping_id`) ,NULL) AS pizza_topping"))
            ->where('orders.user_id', "=", auth()->user()->id)
            ->get();

            return view('order', compact('order'));
    }
}
