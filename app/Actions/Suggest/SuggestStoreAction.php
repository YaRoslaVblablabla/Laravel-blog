<?php

namespace App\Actions\Suggest;

use App\Models\Post;
use Illuminate\Support\Facades\Storage; 

class SuggestStoreAction
{
    public function handler($post){
        
        $post['approved'] = false;
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