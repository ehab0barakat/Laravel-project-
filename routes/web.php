<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book ;
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
Route::resource('m-category', "App\Http\Controllers\CategoriesController");

Route::get('/shop', function () {
    return view('shopping' , [ "books" => book::all() ]);
});


// ------------------------- (        start of orderby and search        ) -------------------------------------------
Route::get('/book/latest', function () {

    return view('shopping' , [ "books" => book::latest()->get() ]);

})->name('m-book.latest');



Route::get('/book/rate', function () {

    dd(book::all());

    return view('shopping' );

})->name('m-book.rate');




Route::get('book/{search}', function () {
    
    return view('shopping');});

// ------------------------- (   end of orderby and search    ) -------------------------------------------
