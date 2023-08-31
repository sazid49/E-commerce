<?php
namespace App\Services;
use DataTables;
use App\Models\backend\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class BrandService{
   
  public function store($data)
  {   
     DB::beginTransaction();
        try {
        if(isset($data['logo']))
        {
          $logo = $data['logo'];
          $filename = time() . '.' . $logo->getClientOriginalExtension();
          $path = $logo->storeAs('images/brands', $filename, 'public');
          $data['logo'] = $path;
          $data['slug'] = Str::slug($data['name']);
          $brand = DB::table('brands')->insert($data);
        }else{
          $data['slug']=Str::slug($data['name']) ?? '';
          $brand = DB::table('brands')->insert($data);
        }
    
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            throw new GeneralException(__('There was a problem creating the subcategory.'));
        }
        DB::commit();
        return $brand;
  }

  public function update(Brand $brand,$data)
  { 
    
    DB::beginTransaction();
    try {

      if(isset($data['logo']))
      {
        $logo = $data['logo'];
                    $filename = time() . '.' . $logo->getClientOriginalExtension();
                    $path = $logo->storeAs('images/brands', $filename, 'public');
                    $data['logo'] = $path;
                    $data['slug']=Str::slug($data['name']) ?? '';
                    $brand =  $brand->update($data);
      }else{
                    $data['slug']=Str::slug($data['name']) ?? '';
                    $brand =  $brand->update($data);
      }

    }catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            throw new GeneralException(__('There was a problem creating the Brand.'));
    }
        DB::commit();
        return $brand;
  }

  public function getId($id)
  {
    return Brand::query()->find($id);
  }

  public function destory(Brand $brand)
  {
    return $brand->delete();
  }
}


