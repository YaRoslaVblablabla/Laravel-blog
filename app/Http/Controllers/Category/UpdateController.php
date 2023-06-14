<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class UpdateController extends Controller
{
    public function __invoke(Category $category, CategoryRequest $request){
        $category->update($request->validated());
        return redirect('panel/categories');
    }
}
