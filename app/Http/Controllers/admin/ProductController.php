<?php

namespace App\Http\Controllers\admin;

use DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\backend\Brand;
use App\Models\backend\Product;
use App\Models\backend\Category;
use App\Models\backend\Warehouse;
use App\Models\backend\PickupPoint;
use App\Models\backend\SubCategory;
use App\Http\Controllers\Controller;
use App\Models\backend\ChildCategory;

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
        $products = Product::query()->get();
        return DataTables::of($products)
                           ->addIndexColumn()
                           ->editColumn('category_name',function($row){
                             return $row->category->name;
                           })
                           ->editColumn('subcategory_name',function($row){
                             return $row->subcategory->name;
                           })
                           ->editColumn('brand_name',function($row){
                             return $row->brand->name;
                           })
                           ->editColumn('featured',function($row){
                                if($row->featured == 1)
                                {
                                  return "Yes";
                                }else{
                                  return 'No';
                                }
                           })
                           ->editColumn('today_deal',function($row){
                                if($row->today_deal == 1)
                                {
                                  return "Yes";
                                }else{
                                  return 'No';
                                }
                           })
                           ->editColumn('status',function($row){
                                if($row->status == 1)
                                {
                                  return 'yes';
                                }else{
                                  return 'No';
                                }
                           })
                           ->addColumn('action',function($row){
                             $actionBtn='<a  class="btn btn-info btn-sm edit" data-id="'.$row->id.'" 
                                              data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
                                                 <a href="'.route('admin.product.destroy',$row->id).'"
                                                  class="btn btn-danger btn-sm" id="delete_product">
                                                  <i class="fas fa-trash-alt"></i></a>';
                             return $actionBtn;
                           })
                           ->rawColumns(['action','category_name'])
                           ->make(true);
                          
      }
        return view('admin.product.index');
    }

    public function create()
    { 

      $brands = Brand::query()->select('id','name')->get();
      $categories = Category::query()->select('id','name')->get();
      $pickupPoints = PickupPoint::query()->select('id','name')->get();
      $warehousees   = Warehouse::query()->select('id','name')->get();


      // dd($categories);
      return view('admin.product.create',compact('brands','categories','pickupPoints','warehousees'));
    }

    public function getChiledCategory($id)
    {
       $data = ChildCategory::where('subcategory_id',$id)->get();
       return response()->json($data);
    }
    public function store(Request $request)
    {   

        // dd($request->all());
       $product = $request->validate([
          'name'=>'required',
          'code'=>'required|unique:products|max:55',
          'subcategory_id'=>'sometimes',
          'warehouse_id'=>'sometimes',
          'childcategory_id'=>'sometimes',
          'childcategory_id'=>'sometimes',
          'brand_id'=>'sometimes',
          'pickup_point_id'=>'sometimes',
          'pickup_point_id'=>'sometimes',
          'unit'=>'sometimes',
          'tags'=>'sometimes',
          'video'=>'sometimes',
          'purchase_price'=>'sometimes',
          'selling_price'=>'sometimes',
          'discount_price'=>'sometimes',
          'discount_price'=>'sometimes',
          'quantity'=>'sometimes',
          'color'=>'sometimes',
          'size'=>'sometimes',
          'description'=>'sometimes',
          'featured'=>'sometimes',
          'today_deal'=>'sometimes',
          'status'=>'sometimes',
          'flash_deal_id'=>'sometimes',
          'cash_on_delivery'=>'sometimes',
       ]);

       $subcategoryId = SubCategory::query()->where('id',$request->subcategory_id)->first();
       $categoryId =$subcategoryId->category_id; 
       $product['category_id']=$categoryId;
       $product['slug']=Str::slug($request->name,'-');
       $product['date']=date('d-m-Y'); 
       $product['month']=date('F');

       if($request->file('thumbnail'))
       {
          $thumbnail = $request->thumbnail;
          $imageName = time() . '.' . $thumbnail->getClientOriginalExtension();
          $thumbnail->storeAs('public/images/product/'.$imageName);
          $product['thumbnail'] = $imageName;

       }

    $images=[];
    if($request->hasFile('images')){
        foreach($request->file('images') as $key => $image){
            $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/product/others/'.$imageName);
            array_push($images,$imageName);
        }
        $product['images'] = json_encode($images);
    }



       Product::create($product);
       return back();
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
