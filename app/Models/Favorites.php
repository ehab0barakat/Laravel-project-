<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\User;


class Favorites extends Model
{
    use HasFactory;
    use SoftDeletes;


    // public function users()
    // {
    //     return $this->belongsToMany(User::class,"user_favourites_books");
    // }

    // public function books()
    // {
    //     return $this->belongsToMany(Book::class,"user_favourites_books")->withTimestamps();
    // }

    // public function Favorite()
    // {
    //     return $this->belongsToMany(Book::class,"user_favourites_books")->withTimestamps();
    // }

    // public function FavoritesHas($bookId)
    // {
    //     return self::Favorite()->where('book_id',$bookId)->exists();
    // }
}
