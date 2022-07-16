<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Book ;
use App\Models\BookRate ;
use App\Models\Category ;
use App\Models\User ;
use App\Models\Manager ;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("shopping" , ["books" => book::all()]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_arr =[] ;
        foreach (category::all() as $cat) {
            array_push($cat_arr , $cat->name) ;
          }

          return view("book.add-book" , ["categories" => $cat_arr ]); ;
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

        $cat_arr =[] ;
        foreach (category::all() as $cat) {
            array_push($cat_arr , $cat->id) ;
          }

        Book::create([
            "title" =>$request->title,
            "auther" =>$request->auther,
            "description" =>$request->description,
            "price" =>$request->price,
            "image" =>$request->image,
            "category_id" => $cat_arr[$request->category_name_index]
        ]) ;
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


        return view("book" , ["book" => book::find($id),'user'=>Auth::user()->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat_arr =[] ;
        foreach (category::all() as $cat) {
            array_push($cat_arr , $cat->name) ;
          }
        return view("book.edit-book" , ["book" => Book::find($id) , "categories" => $cat_arr  ]); ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book , $id)
    {

        $cat_arr =[] ;
        foreach (category::all() as $cat) {
            array_push($cat_arr , $cat->id) ;
        }

        $book->find($id)->update([
            "title" =>$request->title,
            "auther" =>$request->auther,
            "description" =>$request->description,
            "price" =>$request->price,
            "image" =>$request->image,
            "category_id" => $cat_arr[$request->category_name_index]
        ]);

        return redirect()->route("m-book.index"); ;
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
        return redirect()->route("m-book.index");
    }

    public function buy_book(Request $request){
        // return $request->book_id;
        $user = User::find(auth() -> user() -> id );
        $user -> books() -> syncWithoutDetaching([$request -> book_id]);
        $books = $user->books;
        return view('book_cart' , compact('books'));


    }
    }




