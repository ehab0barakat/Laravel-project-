<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class UserRole extends Model
{
    // use HasFactory;


    protected $table= 'user_role';
    protected $fillable=[
        'user_id',
        'role_id'

    ];

    public function users(){
        return $this->belongsToMany('App\User', 'user_id' );
        
    }
    public function roles(){
        return $this->belongsToMany('App\Role', 'role_id' );
        
    }
}
