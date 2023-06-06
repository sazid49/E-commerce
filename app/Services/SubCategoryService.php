<?php

namespace App\Services;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\{Category,SubCategory};


class SubCategoryService{
  

  public  function  index()
  {
        $scategories = SubCategory::query()->get();
        $categories = Category::query()->get();
  }

  public function store($data=[])
  {
  
        DB::beginTransaction();
        try {
          
            $subcategory = SubCategory::query()->create([
                  'name'=>$data['name'] ?? '',
                  'category_id'=>$data['category_id'] ?? '',
                  'slug'=>Str::slug($data['name']) ?? '',
            ]);
    
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            throw new GeneralException(__('There was a problem creating the company.'));
        }
        DB::commit();
        return $subcategory;
    
  }

  public function update($data=[],$subcategory)
  {
    DB::beginTransaction();
        try {
          $subcategory->update([
                    'name'=>$data['name'] ?? '',
                    'slug'=>Str::slug($data['name']) ?? '',
                    'category_id'=>$data['category_id'] ?? '',
                ]);
    
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            throw new GeneralException(__('There was a problem creating the company.'));
        }
        DB::commit();
        return $subcategory;
  }

}