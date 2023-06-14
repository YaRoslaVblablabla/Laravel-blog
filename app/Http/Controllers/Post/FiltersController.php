<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Actions\Post\CatTagAction;
use App\Actions\Post\FilterAction;
use Illuminate\Http\Request;

class FiltersController extends Controller
{
    public function __invoke(CatTagAction $action, FilterAction $action2, Request $request){
        $postsCount = $action2->handler($request);
        $catTag = $action->handler();
        return view('post.filterPage', compact('catTag', 'request', 'postsCount'));
    }
}
