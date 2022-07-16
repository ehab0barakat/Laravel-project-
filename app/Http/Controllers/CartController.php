<?php

namespace App\Http\Controllers;
use Auth ;
use App\Models\Book ;
use App\Models\Category ;
use App\Models\User ;
use App\Models\Manager ;
use App\Models\UserRole ;
use App\Models\UserPurchaseBooks ;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $sum = 0 ;

        $user = User::find(auth() -> user() -> id );
        $user -> books();
        $books = $user->books;
        foreach ($books as $book){
            $sum += $book->price ;
        }

        return view('book_cart' , compact('books'), compact('sum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            // return $request->book_id;

            $user = User::find(auth() -> user() -> id );
            $user -> books() -> syncWithoutDetaching([$request -> book_id]);
            $books = $user->books;

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book , $id)
    {

    UserPurchaseBooks::where("book_id" , $id)
                            ->where("user_id" , Auth::user()->id)
                            ->delete();

    return redirect()->route("cart.index");

    }

}


