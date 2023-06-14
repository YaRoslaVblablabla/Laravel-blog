<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;

class PasswordEditController extends Controller
{
    public function __invoke(){
        return view('page.editPassword');
    }
}
