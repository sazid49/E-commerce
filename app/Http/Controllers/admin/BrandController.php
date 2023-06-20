<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        $brands = Brand::query()->get();

        return view('admin.brand.list');
    }

    public function store(Request $request)
    {
        dd($request->logo);
    }
    
    public function edit($id)
    {
        $brand = Brand::query()->find($id);
        return view('admin.brand.edit',compact('brand'));

    }
    
    public function update()
    {
        
    }
    
    public function destroy()
    {
        
    }
}
