<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\backend\Coupon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {   
        if($request->ajax())
        {
            $data = Coupon::query()->get();
            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action',function($row){
                                $actionBtn='<a  class="btn btn-info btn-sm edit" data-id="'.$row->id.'" 
                                                data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
                                                    <a href="'.route('admin.coupon.destroy',$row->id).'"
                                                    class="btn btn-danger btn-sm" data-id="'.$row->id.'" id="delete_coupon">
                                                    <i class="fas fa-trash-alt"></i></a>';
                                return $actionBtn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);

                            //  return view('admin.childcategory.list');
        }

        return view('admin.settings.offer.coupon');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // 
        $data = $request->all();
        Coupon::query()->create($data);
       return response()->json("Coupon Store Success");


    }

    public function edit($id)
    {    
         $coupon = Coupon::query()->findOrFail($id);
         return view('admin.settings.offer.couponEdit',compact('coupon'));
    }
    public function update(Request $request)
    {
        $coupon = Coupon::query()->findOrFail($request->id);
        $data = [
           'code'=>$request->code,
           'date'=>$request->date,
           'type'=>$request->type,
           'amount'=>$request->amount,
           'status'=>$request->status,
        ];
        $coupon->update($data);
       return response()->json("Coupon update Success");
    }
    public function destroy($id)
    {
       $coupon = Coupon::query()->findOrFail($id)->delete();
       return response()->json("Coupon Delete Success");
    }

}
