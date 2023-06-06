<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use  App\Services\SubCategoryService;

class SubCategoryController extends Controller
{   

    protected $subcategoryservice;

    public function __construct(SubCategoryService $subCategoryService)
    {
         $this->subcategoryservice=$subCategoryService;
    }

    public  function  index()
    {
        $scategories = SubCategory::query()->get();
        $categories = Category::query()->get();
        return view('admin.subcategory.list',compact('categories','scategories'));
    }

    public function store(SubCategoryRequest $request)
    {
        $this->subcategoryservice->store($request->except('_token', '_method'));
        return back()->with(['info'=>'Sub Category added successfully done!']);

    }

    public function edit($id)
    {    
         $categories = Category::query()->get();
         $data = SubCategory::query()->find($id);
        return view('admin.subcategory.edit',compact('categories','data'));  
    }

    public function update(SubCategoryRequest $request)
    {
       $subcategory = SubCategory::query()->where('id',$request->id)->first();
        $this->subcategoryservice->update($request->except('_token', '_method'),$subcategory);
        return back()->with(['info'=>'Category update successfully done!']);
    }

    public function destroy($id)
    {
        SubCategory::query()->find($id)->delete();
        return back()->with(['info'=>'This item deleted successfully done!']);

    }
}
