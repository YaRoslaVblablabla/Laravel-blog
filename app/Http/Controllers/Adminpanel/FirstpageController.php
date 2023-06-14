<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FirstPageController extends Controller
{
    public function __invoke(){
        return view('panel.first-page');
    }
}
