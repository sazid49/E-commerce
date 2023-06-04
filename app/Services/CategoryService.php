<?php

namespace App\Services;

use App\Slim\Slim;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryService {

    public  function getAllCategory()
    {
        return Category::query()->get();
    }

    public function store($data=[])
    {
        $cimage="";
        DB::beginTransaction();
        try {

            $images = Slim::getImages();
            // dd($images);
        if ($images) {
            $image = array_shift($images);
            $Imagename = Str::slug(now()) . '.' . pathinfo($image['output']['name'], PATHINFO_EXTENSION);
            $cdata = $image['output']['data'];
            $output = Slim::saveFile($cdata, $Imagename, '../storage/app/public/uploads/category', false);
            // $pathNFile = $name;
            $data['image'] = $Imagename;
             $category= Category::query()->create([
            'name'=>$data['name'] ?? '',
            'slug'=>Str::slug($data['name']) ?? '',
            'image'=>$data['image'] ?? '',
        ]);
        }else{
            $category= Category::query()->create([
            'name'=>$data['name'] ?? '',
            'slug'=>Str::slug($data['name']) ?? '',
        ]);
        }
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            throw new GeneralException(__('There was a problem creating the company.'));
        }
        DB::commit();
        return $category;
    }

    public function update($data=[],$category)
    {
        $cimage="";
//        dd($category);
        DB::beginTransaction();
        try {
//            $category = Category::query()->findOrFail($id);
            $images = Slim::getImages();
            // dd($images);
            if ($images) {
                $image = array_shift($images);
                $Imagename = Str::slug(now()) . '.' . pathinfo($image['output']['name'], PATHINFO_EXTENSION);
                $cdata = $image['output']['data'];
                $output = Slim::saveFile($cdata, $Imagename, '../storage/app/public/uploads/category', false);
                // $pathNFile = $name;
                $data['image'] = $Imagename;
                $category->update([
                    'name'=>$data['name'] ?? '',
                    'slug'=>Str::slug($data['name']) ?? '',
                    'image'=>$data['image'] ?? '',
                ]);
            }else{
                $category->update([
                    'name'=>$data['name'] ?? '',
                    'slug'=>Str::slug($data['name']) ?? '',
                ]);
            }
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            throw new GeneralException(__('There was a problem creating the company.'));
        }
        DB::commit();
        return $category;
    }
}



