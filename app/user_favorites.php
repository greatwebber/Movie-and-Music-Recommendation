<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_favorites extends Model
{
    public function comment() 
    {
        return $this->hasMany('App\comments');
    }
}
