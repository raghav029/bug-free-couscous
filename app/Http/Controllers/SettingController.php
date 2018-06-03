<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\User;

class SettingController extends Controller
{
    function __constructor()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $setting = Setting::first();
        if($setting != null){
            return view('admin.setting.index', compact('setting'));
        }else{
            return view('admin.setting.index');
        }
    }

    public function update(Request $request)
    {
        // $request->except(['_token']);
        $settings = Setting::find(1);
        if($settings != null){
            $settings->hostel_name = $request->hostel_name;
            $settings->country = $request->country;
            $settings->state = $request->state;
            $settings->city = $request->city;
            $settings->address = $request->address;
            $settings->meta_title = $request->meta_title;
            $settings->meta_description = $request->meta_description;
            $settings->owner_name = $request->owner_name;
            $settings->save();
            \Session::flash('message', 'Settings have been updated');
        }else{
            Setting::create($request->all());
            \Session::flash('message', 'Unable to update Settings');
        }
        return redirect()->back();
    }

    public function administrators()
    {
        $administrators = User::get();
        return view('admin.users.index', compact('administrators'));
    }

    public function edit($id)
    {
        $admin = User::where('id',$id)->first();
        return view('admin.users.edit', compact('admin'));
    }

    public function updateAdmin(Request $request)
    {
        // dd($request->all());
        $data = request()->all();
        $data = request()->except(['_token']);
        
        $user = User::where('email', $request->email)->update($data);
        if($data){
            \Session::flash('success', 'Admin have been updated');
        }else{
            \Session::flash('error', 'Unable to updated admin');
        }
        return redirect()->back();
    }
}
