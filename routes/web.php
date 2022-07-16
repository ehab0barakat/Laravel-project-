<?php

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\CategoriesController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop', function () {
    return view('shopping' , ["books" => book::all()]);
});


// ------------------------- (        start of orderby and search        ) -------------------------------------------

Route::get('/book/latest', function () {

    return view('shopping' , [ "books" => book::latest()->get() ]);

})->name('m-book.latest');



Route::get('/book/rate', function () {

    dd(book::all());

    return view('shopping' );

})->name('m-book.rate');




Route::get('/book/search', function (request $request) {
    if($request->in == "auther"){
        $books = book::where("auther", $request->search)->get() ;
    }
    else if($request->in == "title"){

        $books = book::where("title" , "like" ,  $request->search . "%")->get() ;
    }
    else {
        $books = [] ;
    }

    return view('shopping' ,["books" => $books ]);

})->name('m-book.search');

// ------------------------- (   end of orderby and search    ) -------------------------------------------


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';



Route::resource('m-manger', "App\Http\Controllers\ManagerController");
Route::resource('manager', "App\Http\Controllers\ManagerController");
Route::resource('m-book', "App\Http\Controllers\booksController");

// Categories
Route::resource('Categories', CategoriesController:: class)->middleware(['auth']);

//Favorites Book
Route::get('/Favorites', function () {
    $Book = auth()->user()->Book;
    return view('Favorites' , compact('Book'));
})->name("Favorites");

Route::post('/Fav',[FavoritesController::class,'Fav_book'])->name('Fav');
Route::delete('Favorites', 'FavoritesController@destroy')->name('Favorites.destroy');


// Route::group(['namespace' => 'Favorites' , 'middleware' => 'auth'], function() {
//     Route::post('Favorites', 'FavoritesController@store')->name('Favorites.store');
//     Route::get('Favorites/books', 'FavoritesController@index')->name('Favorites.index');
//     Route::delete('Favorites', 'FavoritesController@destroy')->name('Favorites.destroy');

// });

// USER
Route::group(['prefix' => 'users'], function() {
    Route::get('/', 'UsersController@index')->name('users.index');
    Route::get('/create', 'UsersController@create')->name('users.create');
    Route::post('/create', 'UsersController@store')->name('users.store');
    Route::get('/{user}/show', 'UsersController@show')->name('users.show');
    Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
    Route::PUT('/{user}/update', 'UsersController@update')->name('users.update');
    Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');

});

// buy

Route::get('/cart', function () {
    $books = auth()->user()->books;
    return view('book_cart' , compact('books'));
})->name("cart");


Route::post('/buy',[BooksController::class,'buy_book'])->name('buy');

