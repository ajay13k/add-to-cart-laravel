<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User_Controller;
use App\Http\Controllers\ProductController;
use Symfony\Component\HttpFoundation\Session\Session;

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

Route::get('/', function () {
    return view('login');
});

// Route::get('/logout', function () {
//     session()->forget('user');
//     session()->flash('message', "Logout Successfully");
//     return redirect('/');
// });




Route::get('/product', [ProductController::class, 'product']);

Route::post('/login', [User_Controller::class, 'login']);
Route::get('/logout', [User_Controller::class, 'logout']);

Route::get('/detail/{id}', [ProductController::class, 'detail']);
Route::get('/search', [ProductController::class, 'search']);
Route::post('/cart', [ProductController::class, 'cart']);


Route::get('/cartList', [ProductController::class, 'cartList']);

Route::get('/cartremove/{id}', [ProductController::class, 'cartremove']);

Route::get('/order', [ProductController::class, 'order']);
Route::post('/orderplace', [ProductController::class, 'orderplace']);

Route::get('/producttable', [ProductController::class, 'index']);
Route::get('/addproduct', [ProductController::class, 'addproduct']);


Route::post('createproduct', [ProductController::class, 'createproduct']);

Route::get('/delete/{id}', [ProductController::class, 'deleteproduct']);


Route::get('/editproduct/{id}', [ProductController::class, 'updateproduct']);
Route::post('/edit', [ProductController::class, 'editproduct']);


