<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Actions\Post\CatTagAction;

class CreateController extends Controller
{
    public function __invoke(CatTagAction $action){
       
        $catTag = ($action->handler());
        return view('post.create', ['catTag' => $catTag]);
    }
}
