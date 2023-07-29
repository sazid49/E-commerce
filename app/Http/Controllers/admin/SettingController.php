<?php

namespace App\Http\Controllers\admin;

use App\Models\backend\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeoSettingRequest;

class SettingController extends Controller
{
    public function __construct()
    { 
       $this->middleware('auth');  
    }
    
    public function seoSetting()
    {   
        $seo = SEO::query()->first();
        return view('admin.settings.seo',compact('seo'));
    }

    public function seoSettingUpdate(SeoSettingRequest $request)
    {   
        // dd($request->toArray());
        $validateData = $request->validated();
        if(!empty($request->meta_id)){
           $seo = Seo::query()->first();
           $seo->update($validateData);
           return redirect()->back()->with(['info'=>'Seo Update Success']);
        }else{
            Seo::create($validateData);
            return redirect()->back()->with(['info'=>'Seo Update Success']);
        }
        
    }

}
