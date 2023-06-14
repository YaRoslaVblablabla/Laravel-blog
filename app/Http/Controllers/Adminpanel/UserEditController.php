<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;

class UserEditController extends Controller
{

    public function __invoke(User $user){
        $rols = Role::all();
        return view('panel.editUser', compact('user', 'rols'));
    }

}
