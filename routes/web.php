<?php

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

// Route::get('/cart', function () {
//     $books = auth()->user()->books;
//     return view('book_cart' , compact('books'));
// })->name("cart");



Route::get('/shop', function () {
    return view('shopping' , ["books" => book::all()]);
});


// ------------------------- (        start of orderby and search        ) -------------------------------------------

Route::get('/book/latest', function () {

    return view('shopping' , [ "books" => book::latest()->get() ,"cats" => Category::all() ,
]);

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

    return view('shopping' ,["books" => $books ,"cats" => Category::all()]);

})->name('m-book.search');







Route::post('/book/category', function (request $request) {

    return view('shopping' ,[
        "books" => book::where("category_id", $request->category_id)->get() ,
        "cats" => Category::all() ,
        ] );

})->name('m-book.category');

// ------------------------- (   end of orderby and search    ) -------------------------------------------



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';



Route::resource('manager', "App\Http\Controllers\ManagerController");
Route::resource('cart', "App\Http\Controllers\CartController");
Route::resource('m-book', "App\Http\Controllers\booksController");

// Categories
Route::resource('Categories', CategoriesController:: class)->middleware(['auth']);


//Favorites Book
Route::resource('favourites', FavoritesController:: class)->middleware(['auth']);




//Favorites Book
// Route::get('/Favorites', function () {
//     $Books = auth()->user()->Book;
//     return view('Favorites' , compact('Books'));
// })->name("Favorites");


// Route::post('/Fav',[FavoritesController::class,'Fav_book'])->name('Fav');

// Route::delete('Favorites', 'FavoritesController@destroy')->name('Favorites.destroy');






Route::resource('users', "App\Http\Controllers\UsersController");

// // USER
// Route::group(['prefix' => 'users'], function() {
//     Route::get('/', 'UsersController@index')->name('users.index');
//     Route::get('/create', 'UsersController@create')->name('users.create');
//     Route::post('/create', 'UsersController@store')->name('users.store');
//     Route::get('/{user}/show', 'UsersController@show')->name('users.show');
//     Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
//     Route::PUT('/{user}/update', 'UsersController@update')->name('users.update');
//     Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');

// });



Route::get('/book', 'App\Http\Controllers\BookDescriptionController@index')->name('book.index');
// Route::resource('bookComment', 'BookCommentController');
Route::group(['prefix' => 'BookComment'], function() {
    Route::post('/', 'App\Http\Controllers\BookCommentController@store')->name('BookComment.store');
});

Route::group(['prefix' => 'BookRate'], function() {
    Route::get('/', 'App\Http\Controllers\BookRateController@store')->name('BookRate.store');
});



// Route::middleware('auth')->group(function () {
//     Route::get('/{user}/profile', 'App\Http\Controllers\UsersController@edit')->name('users.edit');
//     Route::PUT('/profile', 'App\Http\Controllers\UsersController@update')->name('users.update');
// });



// $cats =Category::all() ;

// return view("shopping" , ["books" => book::all() ,"cats" => $cats ]) ;





// Route::get('/book/search', function (request $request) {


//     return view('shopping' ,["books" => $books ]);

// })->name('category.filter');
