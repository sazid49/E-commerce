<?php

namespace App\Http\Controllers\admin;

use DataTables;
use Illuminate\Http\Request;
// use Yajra\DataTables\DataTables;
use App\Models\ChildCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ChildCategoryController extends Controller
{
    public function index(Request $request)
    {  
      if($request->ajax())
      {
        $data = ChildCategory::query()
                              ->leftJoin('categories','child_categories.category_id','categories.id')
                              ->leftJoin('sub_categories','child_categories.subcategory_id','sub_categories.id')
                              ->select('child_categories.*','categories.name as category_name','sub_categories.name as subcategory_name')
                              ->get();
        return DataTables::of($data)
                           ->addIndexColumn()
                           ->addColumn('action',function($row){
                             $actionBtn='<a class="btn btn-info btn-sm edit" data-id="{{ $row->id }}" 
                                              data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
                                                 <a href="#"
                                                  class="btn btn-danger btn-sm" id="delete">
                                                  <i class="fas fa-trash-alt"></i></a>';
                             return $actionBtn;
                           })
                           ->rawColumns(['action'])
                           ->make(true);

                          //  return view('admin.childcategory.list');
      }
      $categories = Category::query()->get();
      return view('admin.childcategory.list',compact('categories'));
    }

    public function store()
    {
        
    }
    public function edit()
    {
        
    }
    public function update()
    {
        
    } 
    public function destroy()
    {
        
    }
}
