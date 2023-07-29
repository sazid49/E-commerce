<?php

namespace App\Models\backend;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $guarded=[];

    public function subCategory()
    {
      return  $this->hasMany(SubCategory::class);
    }

    public function ChildCategory()
    {
      return  $this->hasMany(ChildCategory::class);
    }

}
