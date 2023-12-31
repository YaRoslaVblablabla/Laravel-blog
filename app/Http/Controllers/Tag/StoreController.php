<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;


class StoreController extends Controller
{
    public function __invoke(TagRequest $request){
        $data = $request->validated();
        Tag::firstOrCreate($data);
        return redirect('panel/tags');
    }
}
