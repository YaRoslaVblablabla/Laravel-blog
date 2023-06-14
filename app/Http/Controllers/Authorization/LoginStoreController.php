<?php

namespace App\Http\Controllers\Authorization;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Actions\Authorization\LoginStoreAction;
use Illuminate\Support\Facades\Auth;

class LoginStoreController extends Controller
{
    public function __invoke(LoginRequest $request, LoginStoreAction $action){
        $action->handler($request->validated());
        return back(); 
    }
}
