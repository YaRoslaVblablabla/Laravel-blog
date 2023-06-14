<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Actions\Post\PostDeleteAction;

class DeleteController extends Controller
{
    public function __invoke(Post $post, PostDeleteAction $action){
        $action->handler($post);
        return redirect()->route('postIndexPanel');
    }
}
