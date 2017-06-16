<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegisterRequest;
use App\Users;
use DateTime;

class RegisterController extends Controller
{
    //
    public function getRegister() {
    	return view('page.login.register');
    }

    public function postRegister(RegisterRequest $request) {
    	$user = new Users;
        $user->username = $request->txtusername;
		$user->email = $request->txtemail;
		$user->password = bcrypt($request->txtpassword);
        $user->save_pass = $request->txtpassword;
		$user->level = 3;
		$user->created_at = new DateTime();
        $user->save();
        return redirect()->route('getLogin')->with(['add-success' => 'Chúc mừng "'.$request->txtusername.'" đã tạo tài khoản thành công', 'email' => $request->txtemail, 'password' => $request->txtpassword]);
    }


}
