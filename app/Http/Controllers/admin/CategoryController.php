<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {   
        $categories =Category::query()->get();
        // return response()->json($category);
        return view('admin.category.list',compact('categories'));
    }
}
