<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\backend\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategoryController extends Controller
{

    protected $categoryservice;

    public  function __construct(CategoryService $categoryService){
            $this->categoryservice = $categoryService;
    }
    public function index()  
    {
        $categories = $this->categoryservice->getAllCategory();
        return view('admin.category.list',compact('categories'));
    }
    public function store(CategoryRequest $request)
    {
        $categories = $this->categoryservice->store($request->all());
        return back()->with(['info'=>'Category added successfully done!']);

    }

    public function edit($id)
    {
        $data = Category::query()->where('id',$id)->first();
        return response()->json($data);
    }


    public function update(CategoryRequest $request)
    {
        $category = $this->categoryservice->getId($request->id); 
        $this->categoryservice->update($category,$request->all());
        return back()->with(['message'=>'Category update successfully done!']);

    }

    public function destroy($id)
    {   
           $category = $this->categoryservice->getId($id);
           if(!$category){
               return back()->with(['info'=>'this item not available']);
           }else{
            $this->categoryservice->destroy($category);
           }

        return back()->with(['info'=>'this item has been deleted']);


    }
}
