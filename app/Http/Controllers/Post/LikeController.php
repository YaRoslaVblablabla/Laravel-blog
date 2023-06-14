<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use  App\Actions\LikeAction;

class LikeController extends Controller
{
    public function __invoke(Post $post, LikeAction $action){
        $action->handler($post);
        return back();
    }
}
