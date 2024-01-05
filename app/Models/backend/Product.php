<?php

namespace App\Models\backend;

use App\Models\backend\Brand;
use App\Models\backend\Category;
use App\Models\backend\Warehouse;
use App\Models\backend\PickupPoint;
use App\Models\backend\SubCategory;
use App\Models\backend\ChildCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function category()
    {
       return $this->belongsTo(Category::class,'category_id');
    }
    public function subcategory()
    {
       return $this->belongsTo(SubCategory::class,'subcategory_id');
    }
    public function childcategory()
    {
       return $this->belongsTo(ChildCategory::class,'childcategory_id');
    }
    public function warehouse()
    {
       return $this->belongsTo(Warehouse::class,'warehouse_id');
    }
    public function brand()  
    {
       return $this->belongsTo(Brand::class,'brand_id');
    }
    public function pickuppoint()
    {
       return $this->belongsTo(PickupPoint::class,'pickup_point_id');
    }
}
