<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Setting;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('register','home','login','regesteruser');
    }
    public function image_show($filename = null)
    {
        return Image::make(storage_path('app/public/' . $filename))->response();
    }
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function dashboard()
    {
        $setting=Setting::first();
        // return auth()->user()->hasPermission('setting-index');
        // return auth()->user()->with('roles.permissions')->first();
        return view('dashboard.layouts.app',compact('setting'));
    }
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'     =>'required|string|email|max:255|unique:users' ,
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user               = new User();
        $user->name         = $request->name;
        $user->email        = $request->email;

        if($request->hasFile('image'))
        $image = $request->image;
        $filename  = mt_rand(1000, 10000).time().uniqid().'.'.$image->getClientOriginalExtension();
        $path = storage_path('app/public/' . $filename);
        Image::make($image->getRealPath())->resize(100, 100)->save($path);
        $user->image        =$filename;

        $user->password     = bcrypt($request->password);
        $user->save();
        Auth::loginUsingId($user->id);

      //  $user->remember_token=$user->createToken('Myapp')->accessToken;

        return redirect()->route('home');
    }
    public function login()
    {
        return view('site.login');
    }
        public function regesteruser()
    {
        return view('site.register');

    }
    public function home()
    {
        return view('site.home');
    }
   
    public function messages()
    {
        return view('site.message');
    }
}
