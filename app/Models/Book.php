<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

use App\Models\User;


class Book extends Model
{
    use HasFactory;


    protected $table = "books" ;

    // protected $primaryKey ='id' ;
    protected $fillable = ["title", "auther","description" , "price" , "image" , "category_id" ];





    public function books()
    {
        return $this->belongsTo(Category::class , "category_id");
    }

    public function book()
    {
        return $this->hasMany(ReviewRating::class , "review_ratings_id");
    }

    public function relate_user()
    {
        return $this->belongsToMany(Book::class);
    }


    public function users()
    {
        return $this->belongsToMany(User::class,"user_purchase_books");
    }


    public function comments(){
        return $this->hasMany(BookComment::class);
    }
    public function post(){
        return $this->hasMany(Post::class);
    }
    // public function rates(){
        //     return $this->hasMany(BookRate::class);
        // }
        public function ReviewData()
        {
    return $this->hasMany('App\Models\ReviewRating', 'post_id');
    return $this->hasMany('App\Models\ReviewRating', 'post_id');
}
    public function ratings()
    {
        // return $this->hasMany('App\Models\BookRate');
        return $this->hasMany(BookRate::class);
    }

}
