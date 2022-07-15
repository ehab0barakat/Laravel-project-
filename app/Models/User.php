<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Requests\StoreUserRequest;
use App\Models\Category;
use App\Models\Book;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt password when it is updated.
     *
     * @param $value
     * @return string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function relate_book()
    {
        return $this->belongsToMany(User::class);
    }

    public function store(StoreUserRequest $request)
    {
    $validated = $request->validated();
    dd($validated);
    }


    // Favorites:
    public function Favorite()
    {
        return $this->belongsToMany(Book::class,"user_favourites_books")->withTimestamps();
    }

    // 
    public function FavoritesHas($bookId)
    {
        return self::Favorite()->where('book_id',$bookId)->exists();
    }

    






}
