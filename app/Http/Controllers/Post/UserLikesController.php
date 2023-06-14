<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Actions\Post\LikedPostsAction;

class UserLikesController extends Controller
{
    public function __invoke(LikedPostsAction $action){
        $postsCount = $action->handler();
        return view('post.index', ['postsCount' => $postsCount]);
    }
}
