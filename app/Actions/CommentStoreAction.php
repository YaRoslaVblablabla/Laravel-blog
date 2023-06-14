<?php

namespace App\Actions;

use App\Models\Comments;

class CommentStoreAction
{
    public function handler($text, $post){
        $arr = [ 
            'comment' => $text['comment'], 
            'user_id' => auth()->user()->id, 
            'post_id' => $post->id 
        ];
        
        Comments::create($arr);
    }
}