<?php

namespace App\Actions\Post;

use App\Models\Tag;
use App\Models\Category;

class LikedPostsAction
{
    public function handler(){
        $posts = auth()->user()->likedPosts()->paginate(6);
        $count = count(auth()->user()->likedPosts()->get());  
        return [ $count, $posts ];
    }
}