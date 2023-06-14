<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Actions\Post\PostCountAction;

class MainPageController extends Controller
{
    public function __invoke(PostCountAction $action){
        $postsCount = $action->handler();
        return view('post.index', ['postsCount' => $postsCount]);
    }
}
