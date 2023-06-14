<?php

namespace App\Actions\Post;

use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostStoreAction
{
    public function handler($post){
        $post['user_id'] = auth()->user()->id;
        $post['img'] = Storage::put('public/img', $post['file']);
        $post['img'] = mb_substr($post['img'], 6, mb_strlen($post['img']));
        unset($post['file']);         
        
        $tags = [];
        
        if(!empty($post['tags'])){
            $tags = $post['tags'];
            unset($post['tags']);
        }
     
        $post = Post::create($post);
        $post->tags()->attach($tags);
    }
}