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
        return view('post.create', [
            'user' => $user
        ]);
    }

    public function store(Request $request,$id){
        $user=  User::find($id);
        $post = new Post();
        $post->author = $request->author;


        $post->title  = $request->title;
        $post->description = $request->description;
        $post->save();
        return view('post.list', [
            'user' => $user
        ]);    }

    public function list()
    {
        $posts = Post::orderBy('id','desc')->get();
        return view('post.list',compact('posts'));
    }

    public function view($id){
        $post_detail = Post::with('ReviewData')->find($id);
        return view('post.view',compact('post_detail'));
    }

    public function reviewstore(Request $request){
        $review = new ReviewRating();
        $review->post_id = $request->post_id;
        $review->name    = $request->name;
        $review->email   = $request->email;
        $review->user_id=Auth::user()->id;
        // $review->book_id=Book::book()->id;
        $review->phone   = $request->phone;
        $review->comments= $request->comment;
        $review->star_rating = $request->rating;
        $review->save();
        return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
    }
}
