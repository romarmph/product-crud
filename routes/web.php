<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//   return view('index');
// });
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::resource('products', ProductController::class);
Route::post('products/{product}/purchase', [ProductController::class, 'purchase'])->name('products.purchase');
