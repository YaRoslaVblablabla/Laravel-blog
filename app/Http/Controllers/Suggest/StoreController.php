<?php

namespace App\Http\Controllers\Suggest;

Use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Actions\Suggest\SuggestStoreAction;

class StoreController extends Controller
{
    public function __invoke(PostStoreRequest $request, SuggestStoreAction $action){
        $action->handler($request->validated());
        return redirect()->route('postIndex');
    }
}
