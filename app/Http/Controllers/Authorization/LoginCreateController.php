<?php

namespace App\Http\Controllers\Authorization;

use App\Http\Controllers\Controller;

class LoginCreateController extends Controller
{
    public function __invoke(){
        return view('auth.auth');
    }
}
