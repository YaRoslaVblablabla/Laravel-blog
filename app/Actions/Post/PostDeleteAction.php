<?php

namespace App\Actions\Post;

use Illuminate\Support\Facades\Hash; 
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Comments;

class PostDeleteAction
{
    public function handler($post){
        Storage::delete('public'.$post['img']);
        Comments::where('post_id', '=', $post->id)->delete();
        $post->users()->sync([]);
        $post->tags()->sync([]);
        $post->delete(); 
    }
}