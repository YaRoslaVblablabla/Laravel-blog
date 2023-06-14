<?php

namespace App\Actions\Authorization;

use Illuminate\Support\Facades\Auth;

class LogoutAction
{
    public function handler($request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}