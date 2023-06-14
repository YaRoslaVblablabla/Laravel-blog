<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(){
        return view('page.show');
    }
}
