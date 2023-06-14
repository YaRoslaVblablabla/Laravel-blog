<?php

namespace App\Http\Controllers\Authorization;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Actions\Authorization\LogoutAction;

class LogoutController extends Controller
{
    public function __invoke(Request $request, LogoutAction $action){
        $action->handler($request);
        return redirect()->route('firstpage');
    }
}
