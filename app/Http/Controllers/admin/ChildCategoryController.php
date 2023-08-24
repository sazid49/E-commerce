<?php

namespace App\Http\Controllers\admin;

use DataTables;
use Illuminate\Http\Request;
use App\Models\backend\Category;
use Illuminate\Support\Facades\DB;
use App\Models\backend\SubCategory;
use App\Http\Controllers\Controller;
use App\Models\backend\ChildCategory;
use App\Services\ChildCategoryService;
use App\Http\Requests\ChildCategoryRequest;

class ChildCategoryController extends Controller
{   
   protected $childcategoryservice;

    public function __construct(ChildCategoryService $childCategoryService)
    {
         $this->childcategoryservice=$childCategoryService;
    }
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
                             $actionBtn='<a  class="btn btn-info btn-sm edit" data-id="'.$row->id.'" 
                                              data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
                                                 <a href="'.route('admin.child.category.destroy',$row->id).'"
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

    public function store(ChildCategoryRequest $request)
    {     
          $categoryId= SubCategory::where('id',$request->subcategory_id)->select('category_id')->first();
          $this->childcategoryservice->store($request->all(),$categoryId);
          return back()->with(['info'=>'Child category added successfully done!']);
 
    }
    public function edit($id)
    {    
         $categories = Category::query()->get();
         $data = ChildCategory::query()->find($id);
        return view('admin.childcategory.edit',compact('categories','data'));
    }
    public function update(ChildCategoryRequest $request)
    {   
         $childCategory = $this->childcategoryservice->getId($request->id); 
         $cid = SubCategory::query()->where('id',$request->subcategory_id)->select('category_id')->first();
         $this->childcategoryservice->update($childCategory,$request->all(),$cid);
        return back()->with(['info'=>'This item update successfully done!']);

    } 
    public function destroy($id)
    {   
        $childCategory = $this->childcategoryservice->getId($id);
        if(!$childCategory)
        {
            return back()->with(['info'=>'this item not available']);
        }else{
            $this->childcategoryservice->destroy($childCategory);
            return back()->with(['info'=>'This item deleted successfully done!']);
        }
    }
}
