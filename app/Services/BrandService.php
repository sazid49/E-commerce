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
      
      $logo = $data['logo'];
      $slug =Str::slug($data['name']); 
      $data['slug'] = $slug;
      $logoname = $slug.".".$logo->getClientOriginalExtension();
      Image::make($logo)->resize(340,220)->save('images/brands/'.$logoname);
      $data['logo'] = 'public/images/brands/'.$logoname;
      // dd($data);
     DB::beginTransaction();
        try {
            // $brand = Brand::query()->create([
            //       'name'=>$data['name'] ?? '',
            //       'slug'=>Str::slug($data['name']) ?? '',
            //       'logo'=>$strlogo ?? '',
            // ]);

            $brand = DB::table('brands')->insert($data);
    
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
      $brand =  $brand->update([
      'name'=>$data['name'] ?? '',
      'slug'=>Str::slug($data['name']) ?? '',
      ]);
    }catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            throw new GeneralException(__('There was a problem creating the company.'));
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


