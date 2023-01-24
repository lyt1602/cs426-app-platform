<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::join('cart_pizzas', 'carts.id', "=", 'cart_pizzas.cart_id')
            ->join('pizzas', 'cart_pizzas.pizza_id', "=", 'pizzas.id')
            ->join('sizes', 'sizes.id', "=", 'cart_pizzas.size_id')
            ->select('cart_pizzas.*', 'pizzas.url', 'pizzas.title as pizza_name', 'sizes.name as pizza_size', DB::raw("IF(`cart_pizzas`.`topping_id` IS NOT NULL, (SELECT name FROM toppings WHERE `toppings`.`id` = `cart_pizzas`.`topping_id`) ,NULL) AS pizza_topping"))
            ->where('carts.user_id', "=", auth()->user()->id)
            ->where('carts.isProcessed', "=", 0)
            ->get();


        return view('cart', compact('cart'));
    }

    public function update(Request $request)
    {
        try {
            Cart::where("id", $request->cart_id)
                ->update(['isProcessed' => 1]);

            Order::create([
                'user_id' => auth()->user()->id,
                'cart_id' => $request->cart_id
            ]);

            session()->flash('status', 'Success');
            session()->flash('message', 'Checkout Successfully');
        } catch (\Exception $error) {
            session()->flash('status', 'Error');
            session()->flash('message', 'There was a problem');
        }

        return redirect('/cart');
    }

    public function destroy(Request $request)
    {
        try {
            DB::table("cart_pizzas")
                ->where("cart_id", $request->cartId)
                ->where("pizza_id", $request->pizzaId)
                ->delete();
            session()->flash('status', 'Success');
            session()->flash('message', 'Deleted the item successfully');
        } catch (\Exception $error) {
            session()->flash('status', 'Error');
            session()->flash('message', 'There was a problem');
        }
        return redirect('/cart');
    }
    public function addToCart(Request $request)
    {
        if (!$request->pizza_price)
            return redirect()->back();

        if (!$cart = Cart::where("user_id", $request->user()->id)->where('isProcessed', 0)->first()) {
            $cart = Cart::create([
                'user_id' => $request->user()->id,
            ]);
        }
        $cart->pizzas()->attach($request->pizza_id, ['price' => $request->pizza_price, 'quanlity' => $request->quantity, 'pizza_id' => $request->pizza_id, 'cart_id' => $cart->id, 'size_id' => $request->pizza_size, 'topping_id' => $request->pizza_topping]);
        session()->flash('status', 'Success');
        session()->flash('message', 'Item added to cart successfully');

        return redirect('/cart');
    }
}
