<?php

namespace App\Http\Controllers\backend\Api;

use App\Http\Controllers\Controller;
use App\Models\backend\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {   

        
        $products = Product::query()->get();
        return response()->json($products);
    }
}
