<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PizzaController;
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

Auth::routes();

// rotte Admin
Route::middleware('auth')
->namespace('admin')
->name('admin.')
->prefix('admin')
->group(
    function(){
        Route::get('/', [HomeController::class, 'index']);
        Route::resource('pizzas', 'PizzaController');
    }
);
// rotta catch all
Route::get(
    "{any?}",
    function () {
        return view('guests.home');
    }
)->where('any', '.*');
