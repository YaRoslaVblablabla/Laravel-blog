<?php

namespace App\Http\Controllers\Suggest;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Actions\Suggest\SuggestDeleteAction;

class DeleteController extends Controller
{
    public function __invoke(Post $post, SuggestDeleteAction $action){
        $action->handler($post);
        return redirect()->route('suggestedPosts');
    }
}
