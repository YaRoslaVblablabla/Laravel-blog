<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserUpdateController extends Controller
{
    public function __invoke(User $user, Request $request){
        User::where('id', $user->id)->update([ 'role_id' => $request->role ]);
        return redirect()->route('indexUsers');
    }
}
