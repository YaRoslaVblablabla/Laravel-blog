<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comments;

class DeleteController extends Controller
{
    public function __invoke(Comments $comment){
        auth()->user()->id == $comment->user_id || auth()->user()->role_id >= 3 ? $comment->delete() : false;
        return back();
    }
}
