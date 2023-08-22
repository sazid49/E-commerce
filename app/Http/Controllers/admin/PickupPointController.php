<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\backend\PickupPoint;
use Illuminate\Http\Request;
use DataTables;

class PickupPointController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {    

        if($request->ajax())
      {
        $data = PickupPoint::query()->get();
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
        return view('admin.settings.pickuppoint.index');
    }

    public function store(Request $request)
    {  
       $data = $request->only(['name','address','phone','phone_two']);
       PickupPoint::query()->create($data);
       return response()->json('Pickup Point Store Success');
    }

    public function edit($id)
    {    
         $pickupPoint = PickupPoint::query()->findOrFail($id);
         return view('admin.settings.pickuppoint.edit',compact('pickupPoint'));
    }
    public function update(Request $request)
    {
        $pickupPoint = PickupPoint::query()->findOrFail($request->id);
        $data = $request->only(['name','address','phone','phone_two']);
        $pickupPoint->update($data);

       return response()->json("Pickup Point update Success");
    }

     public function destroy($id)
    {
       $coupon = PickupPoint::query()->findOrFail($id)->delete();
       return response()->json("Pickup Point Delete Success");
    }
}
