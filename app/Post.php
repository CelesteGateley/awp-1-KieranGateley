<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [ "title", "body", "user_id" ];

    const RULES = [
        'name' => 'required|min:1|max:256',
        'body' => 'required|min:1'
    ];

    public function poster() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
