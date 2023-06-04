<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
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
    public function store(CategoryRequest $request,Category $category)
    {
        $categories = $this->categoryservice->store($request->except('_token', '_method'));
        return back()->with(['info'=>'Category added successfully done!']);

    }

    public function edit($id)
    {
        $data = Category::query()->where('id',$id)->first();
        return response()->json($data);
    }
    public function update(CategoryRequest $request)
    {
        $category= Category::query()->find($request->id);
        $this->categoryservice->update($request->except('_token', '_method'),$category);
        return back()->with(['info'=>'Category update successfully done!']);

    }

    public function destroy($id)
    {
        Category::query()->findOrFail($id)->delete();
        return back()->with(['info'=>'this item has been deleted']);


    }
}
