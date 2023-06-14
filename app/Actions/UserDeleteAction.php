<?php

namespace App\Actions;

use App\Models\Comments;

class UserDeleteAction
{
    public function handler($user){
        Comments::where('user_id', '=', $user->id)->delete();
        $user->likedPosts()->sync([]);
        $user->delete();
    }
}