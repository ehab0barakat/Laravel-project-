<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Book ;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ReviewRating;

class PostController extends Controller
{
    public function create(User $user)
    {
        // return view('post.create', [
        //     'user' => $user
        // ]);
    }

    public function store(Request $request){
        // $user=  Auth::user()->id;
        // $post = new Post();
        // $post->author = $request->author;
        // $post->title  = $request->title;
        // $post->description = $request->description;
        // $post->save();
        // return view('post.view', [
        //     'user' => $user
        // ]);
     }

    public function list()
    {
        $posts = Post::orderBy('id','desc')->get();
        // return view('post.list',compact('posts'));
    }

    public function view($book_id,$user_id){
        $user=  Auth::user()->id;
        $book=$book_id;

        // $post_detail = Post::with('ReviewData')->find($request);
        return view('post.view',compact('user','book'));
    }

    public function reviewstore(Request $request,$book,$user){
        // dd($request);
        $review = new ReviewRating();
        $review->user_id=$user;
        $book=$review->book_id=$book;
        $review->name    = $request->name;
        $review->email   = $request->email;
        $review->phone   = $request->phone;
        $review->comments= $request->comment;
        $review->star_rating = $request->rating;
        $review->save();
        $reviews=ReviewRating::where ('book_id',$book)->where('user_id',$user)->get();


        // return view("book" , ["book" => book::find($book),'user'=>Auth::user()->id,'reviews'=>$reviews]);
        return redirect()->route('m-book.show',$book);
       }
}
