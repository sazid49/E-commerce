<?php

namespace App\Http\Controllers\admin;

use App\Models\backend\Seo;
use App\Models\backend\Smtp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeoSettingRequest;
use App\Http\Requests\SmtpMailSettingRequest;
use App\Models\backend\Setting;

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

    public function smtpSetting()
    {   
        $smtp = Smtp::query()->first();
        return view('admin.settings.smtp',compact('smtp'));
    }
    public function smtpUpdate(SmtpMailSettingRequest $request)
    {   
        $validateData = $request->validated();
        if(!empty($request->smtp_id)){
           $smtp = Smtp::query()->first();
           $smtp->update($validateData);
           return redirect()->back()->with(['info'=>'Smtp Setting Update Success']);
        }else{
            Smtp::create($validateData);
            return redirect()->back()->with(['info'=>'Smtp Create Success']);
        }
        
    }  

    public function websiteSetting()
    {
        $settings = Setting::query()->first();
        return view('admin.settings.website.index',compact('settings')); 
    }
    public function websiteSettingUpdate(Request $request)
    {   

        $data = $request->Only(['currency','phone_one','phone_two','main_email','support_email','address','facebook','twitter','instagram','linkedin','youtube']);

       if($request->setting_id)
       {
          $setting = Setting::query()->find($request->setting_id);
       if($request->has('logo'))
       {   
            $logo = $request->file('logo');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('images/logo', $filename, 'public');
            $data['logo'] = $path;
       }
       if($request->has('favicon'))
       {
           $logo = $request->file('favicon');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('images/favicon', $filename, 'public');
            $data['favicon'] = $path;
       }
    //    Setting::query()->create($data);
          $setting->update($data);
       }else{
            if($request->has('logo'))
            {   
                    $logo = $request->file('logo');
                    $filename = time() . '.' . $logo->getClientOriginalExtension();
                    $path = $logo->storeAs('images/logo', $filename, 'public');
                    $data['logo'] = $path;
            }
            if($request->has('favicon'))
            {
                $logo = $request->file('favicon');
                    $filename = time() . '.' . $logo->getClientOriginalExtension();
                    $path = $logo->storeAs('images/favicon', $filename, 'public');
                    $data['favicon'] = $path;
            }

            Setting::query()->create($data);
       
       }
       
        return back();
       
    }

}
