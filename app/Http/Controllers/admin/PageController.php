<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use App\Models\backend\Page;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
      public function __construct()
      { 
        $this->middleware('auth');
      }

      public function index()
      {  
         $pages = Page::query()->latest()->get();
         return view('admin.settings.pages.index',compact('pages'));
      }
      public function store(PageRequest $request,$data=[])
      {   
           $data = $request->validated();
           $data['page_slug'] = Str::slug($data['page_name']);
           Page::query()->create($data);
           return redirect()->back()->with(['info'=>'page create success']);
      }

      public function edit($id)
      {
        $page = Page::query()->find($id);
        return view('admin.settings.pages.edit',compact('page'));
      }

      public function update(PageRequest $request,$id,$data=[])
      {    
           $page = Page::query()->find($id);
           $data = $request->validated();
           $data['page_slug'] = Str::slug($data['page_name']);
           $page->update($data);
           return redirect()->back()->with(['info'=>'page update success']);
      }

      public function destroy($id)
      {  
         $page = Page::query()->findOrFail($id)->delete();
         return redirect()->back()->with(['info'=>'Page Delete Successfully Done!']);
      }
}
