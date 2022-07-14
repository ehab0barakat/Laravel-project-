<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::resource('m-manger', "App\Http\Controllers\ManagerController");
Route::resource('m-user', "App\Http\Controllers\UsersController");
Route::resource('m-book', "App\Http\Controllers\booksController");

// 
Route::resource('Categories', CategoriesController:: class)->middleware(['auth']);
// 

Route::get('/shop', function () {
    return view('shopping');
});
