<?php

namespace App\Actions\Authorization;

use Illuminate\Support\Facades\Auth;

class LoginStoreAction
{
    public function handler($request){
        $credentials = $request;
 
        if (Auth::attempt($credentials)) {
            return redirect()->route('postIndex');
        } 
    }
}