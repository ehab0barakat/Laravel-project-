<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
    // protected $primaryKey ='id' ;
    // protected $fillable = ["title", "auther","description" , "price" , "image" , "category_id"];



}
