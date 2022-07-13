<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Book;
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


    public function relate_user()
    {
        return $this->belongsToMany(Book::class);
    }





}

