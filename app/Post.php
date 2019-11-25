<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function poster() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function author() {
        $user = User::find($this->user_id);
        return $user->name;
    }
}
