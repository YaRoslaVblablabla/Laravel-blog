<?php

namespace App\Actions\Post;

use App\Models\Post;

class FilterAction
{
    public function handler($request){
        $posts = Post::where('approved', 1)->get();       
                
        if(!empty($request->tags)){
            $newPosts = [];
            foreach($posts as $post){
                $newTags = [];

                foreach($post->tags as $tag){
                    $newTags[] = $tag->id;
                }
            
                $counter = 0;
                
                foreach($request->tags as $tag){
                    in_array($tag, $newTags) === true ? $counter +=1 : false ;
                    $counter == count($request->tags) ? $newPosts[] = $post : false;
                }
                
                $posts = collect($newPosts);
            }
        }

        if(!empty($request->category_id)){
            $posts = $posts->filter(function ($post) use($request) {
                return $post->category_id == $request->category_id;
            });
        }
    
        if(!empty($request->title)){
            $posts = $posts->filter(function($post) use($request) {
                $pos = strpos(mb_strtolower($post->title), mb_strtolower(trim($request->title)));
                return $pos !== false;
            });
        }
            
        return [ $posts, count($posts) ];
    }
}