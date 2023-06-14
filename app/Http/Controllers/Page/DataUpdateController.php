<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataUpdateController extends Controller
{
    public function __invoke(Request $request){
        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email, 
        ]);

        return redirect('/page');
    }
}
