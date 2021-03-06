<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CheckinBookController;
use App\Http\Controllers\CheckoutBookController;
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
    return view('welcome');
});


Route::get('welcome', [ WelcomeController::class, 'index'])->name('welcome');
Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

Route::post('/books',[BooksController::class,'store']);
Route::patch('/books/{book}-{slug}',[BooksController::class,'update']);
Route::delete('/books/{book}-{slug}',[BooksController::class,'destroy']);
Route::post('/authors',[AuthorsController::class,'store']);
Route::post('/checkout/{book}',[CheckoutBookController::class,'store']);
Route::post('/checkin/{book}',[CheckinBookController::class,'store']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
