<?php

namespace App\Actions;


class PasswordUpdateAction
{
    public function handler($request){
        if(Hash::check($request['password'], auth()->user()->password )){
            auth()->user()->update([
                'password' => Hash::make($request['new_password'])
            ]);

            return view('page.show');
        }
    }
}