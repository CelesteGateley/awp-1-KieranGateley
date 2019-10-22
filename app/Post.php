<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function poster() {
        $this->belongsTo('App/User');
    }
}
