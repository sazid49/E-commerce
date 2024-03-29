<?php

namespace App\Http\Controllers\admin;

use DataTables;
use App\Http\Controllers\Controller;
use App\Models\backend\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {   
       if($request->ajax())
      {
        $data = Warehouse::query()->get();
        return DataTables::of($data)
                           ->addIndexColumn()
                           ->addColumn('action',function($row){
                             $actionBtn='<a  class="btn btn-info btn-sm edit" data-id="'.$row->id.'" 
                                              data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
                                                 <a href="'.route('admin.warehouse.destroy',$row->id).'"
                                                  class="btn btn-danger btn-sm" id="delete_warehouse">
                                                  <i class="fas fa-trash-alt"></i></a>';
                             return $actionBtn;
                           })
                           ->rawColumns(['action'])
                           ->make(true);

                          //  return view('admin.childcategory.list');
      }
        return view('admin.settings.warehouse.index');
    }

    public function store(Request $request)
    {   
        $validated = $request->validate([
             'name' => 'required',
             'phone' => 'required',
             'address' => 'required',
        ]);
        Warehouse::query()->create($validated);
        return redirect()->back()->with(['info'=>'Warehouse Create Successfully Done!']);

    }

    public function edit($id)
    {
        $data = Warehouse::query()->findOrFail($id);
        return view('admin.settings.warehouse.edit',compact('data'));

    }

    public function update(Request $request)
    {   
        $validated = $request->validate([
             'name' => 'required',
             'phone' => 'required',
             'address' => 'required',
        ]);
        $warehouse = Warehouse::query()->find($request->id);
        $warehouse->update($validated);
        return redirect()->back()->with(['info'=>'Warehouse Edit Successfully Done!']);
    }

    public function destroy($id)
    {
        $warehouse = Warehouse::query()->findOrFail($id)->delete();
        return response()->json("Warehouse  Delete Success");
    }
}
