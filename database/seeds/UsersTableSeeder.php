<?php

use App\User;
use App\Post;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run() {
        factory(User::class, 20)->create()->each(function ($user) {
            $posts = factory(Post::class, 3)->make();
            $user->posts()->saveMany($posts);
        });
    }

}
