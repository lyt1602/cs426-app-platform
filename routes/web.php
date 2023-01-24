<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BookDetailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;
use App\Models\Pizza;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* -------------------------------------------------------------------------- */
/*                               Authentication                               */
/* -------------------------------------------------------------------------- */

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loginEmail', [LoginController::class, 'authenticateEmail']);
Route::post('/loginPassword', [LoginController::class, 'authenticatePassword']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

/* -------------------------------------------------------------------------- */
/*                           Unauthenticated Routes                           */
/* -------------------------------------------------------------------------- */

Route::get('/', [PizzaController::class, 'index'])->name('home');
Route::get('/wip', function() {
    return view('wip');
});
Route::get('detail/{id}', [PizzaController::class, 'detail']);

// Protected group by middleware
Route::group(["middleware" => ["auth"]], function () {
    /* -------------------------------------------------------------------------- */
    /*                                    Cart                                    */
    /* -------------------------------------------------------------------------- */

    Route::get('/cart', [CartController::class, 'index']);
    Route::delete('/cart/delete', [CartController::class, 'destroy']);
    Route::patch('/cart/update', [CartController::class, 'update']);
    Route::post('/cart/add_to_cart', [CartController::class, 'addToCart'])->name('cart.add');

    /* -------------------------------------------------------------------------- */
    /*                                    Order                                   */
    /* -------------------------------------------------------------------------- */
    Route::get('/orders', [OrderController::class, 'index']);

});
