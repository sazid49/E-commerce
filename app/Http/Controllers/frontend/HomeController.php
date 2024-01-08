<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\backend\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {  

       $categories = Category::query()->select('id','name')->get();
       return view('frontend.home',compact('categories'));
    }
}
