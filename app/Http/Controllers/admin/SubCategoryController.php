<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public  function  index()
    {

        $scategory = SubCategory::query()->get();
        return view('admin.subcategory.list',compact('scategory'));

    }
}
