<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
Use App\Actions\CommentStoreAction;

class StoreController extends Controller
{
    public function __invoke(Request $request, Post $post, CommentStoreAction $action){
        $action->handler($request->validate(['comment' => 'string' ]), $post);
        return back();
    }
}
