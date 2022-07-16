<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\User;

class UserPurchaseBooks extends Model
{
    use HasFactory;


    protected $table = "user_purchase_books" ;


    // public function bks()
    // {
    //     return $this->belongsToMany( book::class,UserFavouritesBooks::class)->withTimestamps();
    // }

    // public function users(){
    //     return $this->belongsToMany('App\User', 'user_id' );

    // }
    // public function books(){
    //     return $this->belongsToMany('App\Book', 'Book_id' );

    // }

}
