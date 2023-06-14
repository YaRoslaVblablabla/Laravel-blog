<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;
use App\Actions\PasswordUpdateAction;
use Illuminate\Support\Facades\Hash; 

class PasswordUpdateController extends Controller
{
    public function __invoke(PasswordUpdateRequest $request, PasswordUpdateAction $action){
        $action->handler($request->validated());
        return back();
    }
}
