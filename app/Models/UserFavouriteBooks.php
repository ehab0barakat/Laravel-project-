<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\User;

class UserFavouriteBooks extends Model
{
    use HasFactory;


    protected $table = "user_favourites_books" ;



}
