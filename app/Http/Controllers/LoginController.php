<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
    	if (!Auth::check()){
            return view('page.login.login');
        } else {
            return redirect()->route('home');
        }
    }

    public function postLogin(LoginRequest $request){
    	$login =  [
            'email' => $request->txtEmail,
            'password' => $request->txtPass
 
        ];
        if (Auth::attempt($login)) {
            
            return redirect()->route('home');
        } else {
            return redirect('login')->with('error_login', 'Tên đăng nhập hoặc mật khẩu sai');
        }
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect()->route('home');
    }
}
