<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserIndexController extends Controller
{
    public function __invoke(){
        $users = User::paginate(6);
        $count = count(User::all());
        return view('panel.index', ['users' => $users, 'count' => $count]);
    }
}
