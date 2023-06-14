<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class MoreLikesController extends Controller
{
    public function __invoke(){

        $posts = Post::orderByDesc('likes')
                      ->where('approved', 1)
                      ->get()
                      ->take(10);
        return view('post.moreLikes', ['posts' => $posts]);
    }
}
