<?php

namespace App\Http\Controllers\Suggest;

Use App\Http\Controllers\Controller;
use App\Actions\Post\CatTagAction;

class CreateController extends Controller
{
    public function __invoke(CatTagAction $action){
        $catTag = $action->handler();
        return view('suggest.create', compact('catTag'));
    }
}
