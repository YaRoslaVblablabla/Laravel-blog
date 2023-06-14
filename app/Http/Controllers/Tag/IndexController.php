<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke(){
        $count = count(Tag::all());
        $tags = Tag::paginate(8);
        return view('tag.index', compact('tags', 'count'));
    }

}
