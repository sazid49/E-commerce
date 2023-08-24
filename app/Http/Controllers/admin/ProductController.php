<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\backend\Brand;
use App\Models\backend\Category;
use App\Models\backend\PickupPoint;
use App\Models\backend\Product;
use Illuminate\Http\Request;
use DataTables;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if($request->ajax())
      {
        $data = Product::query()->get();
        return DataTables::of($data)
                           ->addIndexColumn()
                           ->addColumn('action',function($row){
                             $actionBtn='<a  class="btn btn-info btn-sm edit" data-id="'.$row->id.'" 
                                              data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
                                                 <a href="'.route('admin.pickuppoint.destroy',$row->id).'"
                                                  class="btn btn-danger btn-sm" id="delete_pickuppoint">
                                                  <i class="fas fa-trash-alt"></i></a>';
                             return $actionBtn;
                           })
                           ->rawColumns(['action'])
                           ->make(true);

                          
      }
        return view('admin.product.index');
    }

    public function create()
    { 

      $brands = Brand::query()->pluck('id','name');
      $categories = Category::query()->pluck('id','name');
      $pickupPoints = PickupPoint::query()->pluck('id','name');

      // dd($categories);
      return view('admin.product.create');
    }
    public function store()
    { 
       return "hello";
    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }
    public function destroy($id)
    {

    }
}
