<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke(Tag $tag, TagRequest $request){
        $data = $request->validated();
        $tag->update($data);
        return redirect('panel/tags');
    }
}

