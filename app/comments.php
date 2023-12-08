<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class, 'userID');
    }

    public function movie()
    {
    	return $this->belongsTo('App\user_favorites');
    }
}
