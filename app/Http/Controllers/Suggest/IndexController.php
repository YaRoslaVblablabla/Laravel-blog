<?php

namespace App\Http\Controllers\Suggest;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{    
    public function __invoke(){
        $posts = Post::where('approved', false)->paginate(5);
        $count = count(Post::where('approved', false)->get());
        return view('suggest.index', compact('posts', 'count'));
    }
}
