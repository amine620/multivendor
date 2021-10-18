<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view("dashboard.auth.login");
    }
    public function store(AdminLoginRequest $request)
    {
       $remember_me=$request->has('remember_me') ? true : false;
       if(auth()->guard('admin')->attempt(["email"=>$request->email,'password'=>$request->password]))
       {
           return redirect()->route('admin');
       }
       else{
           return redirect()->back()->with(['error'=> 'هناك خطأ في البيانات']);
       }
    }
}
