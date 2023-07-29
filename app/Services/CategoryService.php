<?php

namespace App\Services;

use App\Slim\Slim;
use App\Models\backend\Category;
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

    public function update(Category $category,$data): Category
    {
        $cimage="";
        DB::beginTransaction();
        try {
            $images = Slim::getImages();
            if ($images) {
                $image = array_shift($images);
                $Imagename = Str::slug(now()) . '.' . pathinfo($image['output']['name'], PATHINFO_EXTENSION);
                $cdata = $image['output']['data'];
                $output = Slim::saveFile($cdata, $Imagename, '../storage/app/public/uploads/category', false);
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

    public function destroy(Category $category): bool
    {
        // Delete the post
        return $category->delete();
    }

    public function getId($id)
    {
        return Category::query()->find($id);
    }
}



