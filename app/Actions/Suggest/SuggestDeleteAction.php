<?php

namespace App\Actions\Suggest;

use Illuminate\Support\Facades\Storage; 

class SuggestDeleteAction
{
    public function handler($post){
        Storage::delete($post['img']);
        $post->tags()->sync([]);
        $post->delete(); 
    }
}