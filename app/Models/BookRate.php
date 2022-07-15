<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRate extends Model
{
    use HasFactory;


    protected $table = 'book_rates';
    protected $fillable = [
        'rate',
        'user_id',
        'book_id',
        
    ];
    public function userRate()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
