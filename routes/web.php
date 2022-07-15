<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;

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


Route::resource('manager', "App\Http\Controllers\ManagerController");
Route::resource('m-user', "App\Http\Controllers\UsersController");
Route::resource('m-book', "App\Http\Controllers\booksController");
Route::resource('m-category', "App\Http\Controllers\CategoriesController");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['prefix' => 'manager'], function() {
//     Route::get('/', 'App\Http\Controllers\ManagerController@index')->name('manager.index');
//     Route::get('/create', 'App\Http\Controllers\ManagerController@create')->name('manager.create');
//     Route::get('/', 'App\Http\Controllers\ManagerController@store')->name('manager.store');
//     Route::get('/{manager}/edit', 'App\Http\Controllers\ManagerController@edit')->name('manager.edit');
//     Route::put('/{manager}/update', 'App\Http\Controllers\ManagerController@update')->name('manager.update');
//     Route::delete('/{manager}/delete', 'App\Http\Controllers\ManagerController@destroy')->name('manager.destroy');
// });




Route::get('/book', 'App\Http\Controllers\BookDescriptionController@index')->name('book.index');
// Route::resource('bookComment', 'BookCommentController');
Route::group(['prefix' => 'BookComment'], function() {
    Route::post('/', 'App\Http\Controllers\BookCommentController@store')->name('BookComment.store');
    // Route::put('/{manager}/update', 'App\Http\Controllers\ManagerController@update')->name('manager.update');
    // Route::delete('/{manager}/delete', 'App\Http\Controllers\ManagerController@destroy')->name('manager.destroy');
});

Route::group(['prefix' => 'BookRate'], function() {
    Route::get('/', 'App\Http\Controllers\BookRateController@store')->name('BookRate.store');
});








// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
