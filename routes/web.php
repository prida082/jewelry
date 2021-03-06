<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;

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
    if (Auth::check()) {
        return redirect('/home');
    } else {
        return view('index');
    }
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [HomeController::class, 'admin_login'])->name('admin');

Route::get('/create', [HomeController::class, 'create_product'])->name('create');

//Basket 
Route::resource('baskets', OrderController::class);

Route::post('/baskets',  [OrderController::class, 'store'])->name('Basket');
// Route::post('/baskets',  'App\Http\Controllers\OrderController@update')->name('Basket');

Route::get('/product', function () {
    return view('product.index');
});
