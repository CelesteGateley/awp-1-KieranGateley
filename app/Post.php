<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function poster() {
        $this->belongsTo('App/User');
    }

    public function author() {
        $user = User::find($this->user_id);
        return $user->name;
    }
}
