<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

use App\Models\User;


class Book extends Model
{
    use HasFactory;
    protected $table = "books";
    protected $guarded = ['id'];
    protected $fillable = [
        'title',
        'author',
        'description',
        'price',
        'image',
        'rate',
        'category_id',
        'user_id',
        'count',
    ];
    public function users(){
        return $this->belongsToMany(User::class,"user_purchase","book_id","user_id");
    }

    public function comments(){
        return $this->hasMany(BookComment::class);
    }
    public function rates(){
        return $this->hasMany(BookRate::class);
    }




    public function books()
    {
        return $this->belongsTo(Category::class , "category_id");
    }


    public function relate_user()
    {
        return $this->belongsToMany(Book::class);
    }

}


