<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Hash;

class TenantLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest');
    }

    public function showLoginForm()
    {
      // echo "test";exit;
      return view('tenant.login');
    }
    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
        ]);
        // Attempt to log the user in
      //   if (Auth::guard('tenant')->attempt(['email' => $request->email, 'password' => $request->password])) {
      //   // dd('into if');
      //   // echo "yrdyd";
      //   // if successful, then redirect to their intended location
      //   return redirect()->route('tenantHome');
      // }
      //Attemp to log the tenant in
      $tenant = DB::table('tenants')
      ->where('email', $request->input('email'))
      ->first();
      if(!Blank($tenant)){
        if(Hash::check($request->input('password'), $tenant->password)){
          echo "matched";
          session()->put('tenant_id',$tenant->id);
          session()->put('tenant_name',$tenant->name);
          session()->put('tenant_email',$tenant->email);
          // session()->forget();
          // dd(session('tenant_id'));
          return redirect()->route('tenantHome');
        }else{
          echo redirect()->back()->withInput($request->only('email', 'remember'));
        }
      }else{
        echo redirect()->back()->withInput($request->only('email', 'remember'));
      }
      // dd($tenant);
      // if unsuccessful, then redirect back to the login with the form data
      // return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
