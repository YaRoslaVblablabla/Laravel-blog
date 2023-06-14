<?php

namespace App\Actions\Post;

use Illuminate\Support\Facades\Storage;

class PostUpdateAction
{
    public function handler($data, $post){
        
        $post['approved'] = true;

        if(!empty($data['file'])){
            $data['img'] = Storage::put('public/img', $data['file']);
            $data['img'] = mb_substr($data['img'], 6, mb_strlen($data['img']));
            unset($data['file']);  
        }

        $tags = [];

        if(!empty($data['tags'])){
            $tags = $data['tags'];
            unset($data['tags']);
        } 

        $post->update($data);
        $post->tags()->sync($tags);

    }
}