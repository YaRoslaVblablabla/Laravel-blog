<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Actions\Post\CatTagAction;


class EditController extends Controller
{
    public function __invoke(Post $post, CatTagAction $action){
        $catTag = ($action->handler());
        return view('post.edit', ['catTag' => $catTag, 'post' => $post ]);
    }
}
