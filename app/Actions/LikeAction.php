<?php

namespace App\Actions;

class LikeAction
{
    public function handler($post){
        auth()->user()->likedPosts()->toggle($post->id);
        $post->update([
            'likes' => count($post->users),
        ]);
    }
}