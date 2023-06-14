<?php

namespace App\Actions\Post;

use App\Models\Tag;
use App\Models\Category;

class CatTagAction
{
    public function handler(){
        $categories = Category::all();
        $tags = Tag::all();
        return [$categories, $tags];
    }
}