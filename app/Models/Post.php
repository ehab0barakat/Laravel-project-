<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "users" ;
    // protected $table = "books" ;

    public function ReviewData()
    {

        return $this->hasMany('App\Models\ReviewRating','post_id');
    return $this->hasMany('App\Models\ReviewRating','post_id');
    }
    public function book(){
        return $this->hasMany('App\Models\Book ','book_id');
    }
}
