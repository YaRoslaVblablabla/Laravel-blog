<?php

namespace App\Actions\Post;

use App\Models\Post;
use App\Models\Category;

class PostCountAction
{
    public function handler(){
        $posts = Post::where('approved', 1)->paginate(6);
        $count = count(Post::where('approved', 1)->get());
        $categories = Category::all();
        return [ $count, $posts, $categories ];
    }
}