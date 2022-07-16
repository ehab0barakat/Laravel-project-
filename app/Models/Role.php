<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    // function show that 1 or many users belongs to user_role table
    public function users(){


        return $this->belongsToMany(user::class,'user_role');
    }


}
