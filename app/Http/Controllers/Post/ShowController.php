<?php

namespace App\Http\Controllers\Post;

Use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comments;

class ShowController extends Controller
{
    public function __invoke(Post $post){
        $comments = Comments::where('post_id', $post->id)->paginate(5);
        return view('post.show', ['post' => $post, 'comments' => $comments]);
    }

}
