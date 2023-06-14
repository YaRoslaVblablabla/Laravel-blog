<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use App\Actions\Post\PostUpdateAction;

class UpdateController extends Controller
{
    public function __invoke(PostUpdateRequest $request, Post $post, PostUpdateAction $action){
        $action->handler($request->validated(), $post);
        return redirect()->route('postIndexPanel');
    }
}
