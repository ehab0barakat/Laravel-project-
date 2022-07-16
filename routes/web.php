<?php
use App\Http\Controllers\BooksController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/cart', function () {
    $books = auth()->user()->books;
    return view('book_cart' , compact('books'));
})->name("cart");



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






Route::resource('manager', "App\Http\Controllers\ManagerController");

// Route::resource('m-user', "App\Http\Controllers\UsersController");
Route::post('/buy',[BooksController::class,'buy_book'])->name('buy');
Route::resource('m-book', "App\Http\Controllers\booksController");

//
Route::resource('Categories', CategoriesController:: class)->middleware(['auth']);
//

Route::group(['prefix' => 'users'], function() {
    Route::get('/', 'App\Http\Controllers\UsersController@index')->name('users.index');
    Route::get('/create', 'App\Http\Controllers\UsersController@create')->name('users.create');
    Route::post('/create', 'App\Http\Controllers\UsersController@store')->name('users.store');
    Route::get('/{user}/show', 'App\Http\Controllers\UsersController@show')->name('users.show');
    Route::get('/{user}/edit', 'App\Http\Controllers\UsersController@edit')->name('users.edit');
    Route::PUT('/{user}/update', 'App\Http\Controllers\UsersController@update')->name('users.update');
    Route::delete('/{user}/delete', 'App\Http\Controllers\UsersController@destroy')->name('users.destroy');

});

// Route::middleware('auth')->group(function () {
//     Route::get('/{user}/profile', 'App\Http\Controllers\UsersController@edit')->name('users.edit');
//     Route::PUT('/profile', 'App\Http\Controllers\UsersController@update')->name('users.update');
// });

#Manage Post
Route::get('/post-create','App\Http\Controllers\PostController@create')->name('post.create');
Route::post('/post-store','App\Http\Controllers\PostController@store')->name('post.store');
Route::get('/post-list','App\Http\Controllers\PostController@list')->name('post.list');
Route::get('/post-view/{id}','App\Http\Controllers\PostController@view')->name('post.view');

#Manage Review
Route::post('/review-store',[PostController::class, 'reviewstore'])->name('review.store');

