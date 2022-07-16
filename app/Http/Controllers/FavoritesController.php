<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorites;
use App\Models\Book ;
use App\Models\User ;
use App\Models\UserFavouriteBooks ;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth() -> user() -> id );
        $user -> favs();
        $Books = $user->favs;
        // dd($books);
        return view('Favorites' , compact('Books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (! auth()->user()->FavoritesHas(request('BookId'))){
        //     auth()->user()->Favorite()->attach(request('BookId'));
        // }
        // dd($id);

        $user = User::find(auth() -> user() -> id );
        $user -> favs() -> syncWithoutDetaching([$request -> book_id]);
        $books = $user->favs;
        // dd($user -> favs());
        // dd($user -> favs() -> syncWithoutDetaching([$request -> book_id]));


        return redirect()->route("m-book.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book , $id)
    {

        UserFavouriteBooks::where("book_id" , $id)
        ->where("user_id" , Auth::user()->id)
        ->delete();

        return redirect()->route("favourites.index");

}
        // $book->find($id)->delete();
        // return redirect()->route("Favorites");

        // auth()->user()->Favorite()->detach(request('BookId'));

    }


    // public function Fav_book(Request $request){
    //     $Fuser = User::find(auth() -> user() -> id );
    //     $Fuser -> book() -> syncWithoutDetaching([$request -> book_id]);
    //     $Book = $Fuser->Book;
    //     return view('Favorites' , compact('Book'));

    // }

// }
