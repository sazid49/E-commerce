<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Models\ChildCategory;
use Illuminate\Support\Facades\DB;


class ChildCategoryService{


    public function index()
    {

    }
    public function store($data=[],$categoryId)
    {   
        // dd($categoryId);
        DB::beginTransaction();  
        try { 
            $childcategory = ChildCategory::query()->create([
                  'name'=>$data['name'] ?? '',
                  'slug'=>Str::slug($data['name']) ?? '',
                  'subcategory_id'=>$data['subcategory_id'] ?? '',
                  'category_id'=>$categoryId['category_id'] ?? '',
            ]);
           
    
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            throw new GeneralException(__('There was a problem creating the childcategory.'));
        }
        DB::commit();
        return $childcategory;
    }

    public function update($data=[],$childCategory,$cid)
    {   
        // dd($cid->category_id);
        DB::beginTransaction();
        try {
          $childCategory->update([
                   'name'=>$data['name'] ?? '',
                   'slug'=>Str::slug($data['name']) ?? '',
                   'subcategory_id'=>$data['subcategory_id'] ?? '',
                   'category_id'=>$cid['category_id'] ?? '',
                ]);
    
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            throw new GeneralException(__('There was a problem creating the company.'));
        }
        DB::commit();
        return $childCategory;
    }
}


