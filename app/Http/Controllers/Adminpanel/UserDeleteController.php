<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Comments;
use App\Actions\UserDeleteAction;

class UserDeleteController extends Controller
{
    public function __invoke(User $user, UserDeleteAction $action){
        $action->handler($user);
        return back();
    }
}
