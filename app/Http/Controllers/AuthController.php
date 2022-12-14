<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }
    public function register(){
        $image=request()->file('image');
        if($image){
            $image_name=uniqid().$image->getClientOriginalName();
            $image->move(public_path('/images'),$image_name);
        }
        else{
            $image_name=null;
        }
        $user=User::create([
            'name'=>request()->name,
            'email'=>request()->email,
            'password'=>Hash::make(request()->password),
            'image'=>$image_name
        ]);
        auth()->login($user);
        return redirect('/')->with('success','Welcome '.$user->name);
    }
    public function showLogin(){
        return view('auth.login');
    }
    public function login(){
        $email=request()->email;
        $password=request()->password;
        $checkUser=User::where('email',$email)->first();
        if(!$checkUser){
            return redirect()->back()->with('error','Wrong Email');
        }
       $checkPassword= Hash::check($password,$checkUser->password);
       if(!$checkPassword){
        return redirect()->back()->with('error','Wrong Password');
       }
       auth()->login($checkUser);
       return redirect('/')->with('success','Welcome Back '.$checkUser->name);
    }
    public function logout(){
        auth()->logout();
        return redirect('/login');
    }
}
