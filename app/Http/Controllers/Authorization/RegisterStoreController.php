<?php

namespace App\Http\Controllers\Authorization;

use App\Http\Controllers\Controller;
use App\Actions\Authorization\RegisterStoreAction;
use App\Http\Requests\RegisterRequest;

class RegisterStoreController extends Controller
{
    public function __invoke(RegisterRequest $request, RegisterStoreAction $action){
        $action->handler($request->validated());
        return redirect()->route('postIndex');
    }
}