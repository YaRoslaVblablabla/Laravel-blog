<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class StoreController extends Controller
{
    public function __invoke(CategoryRequest $request){
        Category::firstOrCreate($request->validated());
        return redirect('panel/categories');
    }

}
