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


    protected $table = "users" ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        "isActive",
        "isAdmin"
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
    public function setPasswordAttribute($password)
    {
    $this->attributes['password'] = bcrypt($password);
    }
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

    public function relate_book()
    {
        return $this->belongsToMany(User::class);
    }

    public function store(StoreUserRequest $request)
    {
    $validated = $request->validated();
    dd($validated);
    }



public function roles(){
    return $this->belongsToMany(Role::class ,'user_role' );
}

public function myRate()
{
    return $this->hasMany(BookRate::class);
}

    public function books()
    {
        return $this->belongsToMany(Book::class,"user_purchase_books")->withTimestamps();
    }



    public function favs()
    {
        return $this->belongsToMany(Book::class,"user_favourites_books")->withTimestamps();
    }

}
