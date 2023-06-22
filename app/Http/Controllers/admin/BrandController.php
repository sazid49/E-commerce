<?php

namespace App\Http\Controllers\admin;

use DataTables;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Services\BrandService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;


class BrandController extends Controller
{   
    public $brandservice;
    public function __construct(BrandService $brandService)
    {
        $this->middleware('auth');
        $this->brandservice=$brandService;
    }

    public function index(Request $request)
    {   
        if($request->ajax())
        {
            $brands = Brand::query()->get();
            return DataTables::of($brands)
                               ->addIndexColumn()
                               ->addColumn('action',function($row){
                                $actionBtn='<a  class="btn btn-info btn-sm edit" data-id="'.$row->id.'" 
                                              data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
                                                 <a href="'.route('admin.brand.destroy',$row->id).'"
                                                  class="btn btn-danger btn-sm" id="delete">
                                                  <i class="fas fa-trash-alt"></i></a>';
                                return $actionBtn;
                           })
                           ->rawColumns(['action'])
                           ->make(true);
        }
        return view('admin.brand.list');
    }

    public function store(BrandRequest $request)
    {
        $this->brandservice->store($request->except('_token','_method'));  
        return back();
    }
    
    public function edit($id)
    {
        $brand = Brand::query()->find($id);
        return view('admin.brand.edit',compact('brand'));

    }
    
    public function update()
    {
        
    }
    
    public function destroy($id)
    {
        $brand = $this->brandservice->getId($id);
        if(!$brand){
            return back()->with(['info'=>'this item not available']);
        }else{
            $this->brandservice->destory($brand);
            return back()->with(['info'=>'this item delete success!']);

        }
    }
}
