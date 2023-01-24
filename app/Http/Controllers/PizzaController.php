<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Size;
use App\Models\Topping;

class PizzaController extends Controller
{
    public function index()
    {
        return view('index', ['pizzas' => Pizza::all()]);
    }
    public function detail($id)
    {
        return view('detail', ['pizza' => Pizza::find($id), 'sizes' => Size::all(), 'toppings' => Topping::all()]);
    }

    public function showPizzas()
    {
        $pizzas = Pizza::orderBy('id')->paginate(7);

        return view('pages.pizzas', compact('pizzas'));
    }
}
