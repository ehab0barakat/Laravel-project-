<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Book;

class Category extends Model
{
    use HasFactory;


    protected $table = "categories" ;

    // protected $primaryKey ='id' ;
    // protected $fillable = ["name"];




    public function books()
    {
        return $this->hasMany(Book::class);
    }

}

