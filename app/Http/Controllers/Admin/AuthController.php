<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin(){
        return view('admin.auth.login');
    }
    public function login(Request $request){
        $cre=$request->only('email','password');
        if(auth()->guard('admin')->attempt($cre)){
            return redirect('/admin/');
        }
        return "Email and password don't match";
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
}
