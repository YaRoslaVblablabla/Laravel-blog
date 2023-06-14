<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Actions\Post\PostStoreAction;

class StoreController extends Controller
{
    public function __invoke(PostStoreRequest $request, PostStoreAction $action){
        $action->handler($request->validated());
        return redirect()->route('postIndexPanel');
    }
}

