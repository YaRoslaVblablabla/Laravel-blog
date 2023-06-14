<?php

namespace App\Http\Controllers\Suggest;

Use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Actions\Post\CatTagAction;

class EditController extends Controller
{    
    public function __invoke(Post $post, CatTagAction $action){
        $catTag = $action->handler();
        return view('suggest.edit', compact('catTag', 'post'));
    }
}
