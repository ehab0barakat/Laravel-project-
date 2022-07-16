<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavouritesBooks extends Model
{
    use HasFactory;


    protected $table = "user_favourites_books" ;


    public function users(){
        return $this->belongsToMany('App\User', 'user_id' );

    }
    public function books(){
        return $this->belongsToMany('App\Book', 'Book_id' );

    }

}
