<?php

namespace App\Http\Controllers;
use App\Setting;
use Illuminate\Http\Request;
use App\Helper\FileManager;
use LaravelLocalization;

class SettingController extends Controller
{
    public function __constuct() {
        $this->middleware('permission:setting-edit')->only('edit','update');
        $this->middleware('permission:setting-index')->only([ 'index']);

    }

    public function index(){
        $setting=Setting::first();
       // return $setting;
        return view('dashboard.settings.index',compact('setting'));
    }

    public function edit(){
        $setting=Setting::first();
        return view('dashboard.settings.edit',compact('setting'));
    }

    public function update(Request $request , $id){
        $request->validate([
            'order'     => 'required|integer',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        foreach(LaravelLocalization::getSupportedLocales() as $locale => $prop) {
            $this->validate($request,[
                "title.$locale"       => 'required|string',
                "description.$locale" => 'required|string',
            ]);
         }

        $setting                =Setting::find($id);
        $setting->order         =$request->order;
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $setting->{"title:$localeCode"}    = $request->title["$localeCode"];
            $setting->{"description:$localeCode"}    = $request->description["$localeCode"];
        }
        if($request->hasFile('image'))
        $setting->image              = FileManager::upload_image($request, 'image', 1000, 1000);
        $setting->save();
        return redirect()->route('dashboard')->with(['status' => 'success', 'message' => __('updated successfully')]);
    }
}
