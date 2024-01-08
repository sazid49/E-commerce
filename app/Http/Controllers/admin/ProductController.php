<?php

namespace App\Http\Controllers\admin;

use DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\backend\Brand;
use App\Models\backend\Product;
use App\Models\backend\Category;
use App\Models\backend\Warehouse;
use Illuminate\Support\Facades\DB;
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
        // $products = Product::query()->get();

        // if($request->category_id){
        //      $products->where('category_id',$request->category_id);
        // }

        $products="";
              // $query=DB::table('products')->leftJoin('categories','products.category_id','categories.id')
              //       ->leftJoin('sub_categories','products.subcategory_id','sub_categories.id')
              //       ->leftJoin('brands','products.brand_id','brands.id');
                    $query = Product::query();


                if ($request->category_id) {
                    // $query->where('products.category_id',$request->category_id);
                    $query->where('category_id',$request->category_id);
                 }

                if ($request->brand_id) {
                    // $query->where('products.brand_id',$request->brand_id);
                    $query->where('brand_id',$request->brand_id);
                }

                if ($request->warehouse_id) {
                    // $query->where('products.warehouse',$request->warehouse);
                    $query->where('warehouse_id',$request->warehouse_id);
                }

                if ($request->status=="1") {
                    // $query->where('products.status',1);
                    $query->where('status',1);
                }
                if ($request->status=="0") {
                    // $query->where('products.status',0);
                    $query->where('status',0);
                }


            // $products=$query->select('products.*','categories.name as category_name','sub_categories.name as subcategory_name','brands.name as brand_name')
            //         ->get();
                    $products=$query->get();


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
                                  return '<a href="#" data-id="'.$row->id.'" class="deactive_featured"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span> </a>';

                                }else{
                                  return '<a href="#" data-id="'.$row->id.'" class="active_featured"><i class="fas fa-thumbs-up text-danger"></i> <span class="badge badge-danger">deactive</span> </a>';

                                }
                           })
                           ->editColumn('today_deal',function($row){
                                if($row->today_deal == 1)
                                {
                                  return '<a href="#" data-id="'.$row->id.'" class="deactive_today_deal"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span> </a>';

                                }else{
                                  return '<a href="#" data-id="'.$row->id.'" class="active_today_deal"><i class="fas fa-thumbs-up text-danger"></i> <span class="badge badge-danger">deactive</span> </a>';

                                }
                           })
                           ->editColumn('status',function($row){
                                if($row->status == 1)
                                {
                                  return '<a href="#" data-id="'.$row->id.'" class="deactive_status"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span> </a>';
                                    //  return '<input type="checkbox" data-id="'.$row->id.'" class="deactive_status" name="featured" value="1" checked
                                    //         data-bootstrap-switch data-off-color="danger" data-on-color="success">';
                                }else{
                                  return '<a href="#" data-id="'.$row->id.'" class="active_status"><i class="fas fa-thumbs-up text-danger"></i> <span class="badge badge-danger">deactive</span> </a>';
                                    //  return '<input type="checkbox" data-id="'.$row->id.'" name="featured" value="1" class="active_status"
                                    //         data-bootstrap-switch data-off-color="danger" data-on-color="success">';
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
                           ->rawColumns(['action','category_name','subcategory_name','brand_name','featured','today_deal','status'])
                           ->make(true);
                          
      }

        $categories = Category::query()->select('id','name')->get();
        $brands = Brand::query()->select('id','name')->get();
        $warehousees   = Warehouse::query()->select('id','name')->get();
        return view('admin.product.index',compact('categories','brands','warehousees'));
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
    public function deactiveSTatus($id)
    {

      Product::query()->where('id',$id)->update([
         'status'=>0,
      ]);

        return response()->json('Product Status Update');
    } 
    public function activeSTatus($id)
    {

      Product::query()->where('id',$id)->update([
         'status'=>1,
      ]);

        return response()->json('Product Status Update');
    }

    public function activeToDayDeal($id)
    {
       Product::query()->where('id',$id)->update([
         'today_deal'=>1,
      ]);

        return response()->json('Product To Day Deal Active');
    }
    public function deActiveToDayDeal($id)
    {
       Product::query()->where('id',$id)->update([
         'today_deal'=>0,
      ]);

        return response()->json('Product To Day Deal Deactive');
    }
    public function activeFeatured($id)
    {
       Product::query()->where('id',$id)->update([
         'featured'=>1,
      ]);

        return response()->json('Product featured Active');
    }
    public function deActiveFeatured($id)
    {
       Product::query()->where('id',$id)->update([
         'featured'=>0,
      ]);

        return response()->json('Product featured Deactive');
    }
}
