<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorites;
use App\Models\Book ;
use App\Models\User ;

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
        $user -> books();
        $books = $user->favs;

        foreach ($books as $book){
            $sum += $book->price ;
        }
        return view('book_cart' , compact('books'));
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
        if (! auth()->user()->FavoritesHas(request('BookId'))){
            auth()->user()->Favorite()->attach(request('BookId'));
        }
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
        $book->find($id)->delete();
        return redirect()->route("Favorites");

        // auth()->user()->Favorite()->detach(request('BookId'));

    }


    public function Fav_book(Request $request){
        $Fuser = User::find(auth() -> user() -> id );
        $Fuser -> book() -> syncWithoutDetaching([$request -> book_id]);
        $Book = $Fuser->Book;
        return view('Favorites' , compact('Book'));


    }

}
