<?php

namespace App\Actions\Authorization;

use Illuminate\Support\Facades\Hash; 
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterStoreAction
{
    public function handler($request){
        $user = $request;
        $user['password'] = Hash::make($user['password']);
        $user = User::create($user);
        Auth::login($user);
    }
}