<?php

namespace App\Models\backend;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded=[];

    public  function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ChildCategory()
    {
      return  $this->hasMany(ChildCategory::class);
    }
}
