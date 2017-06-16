<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserAdminRequest;
use App\Http\Requests\EditUserRequest;
use App\Users;
use Illuminate\Support\Facades\Auth;
use DateTime;

class UserController extends Controller
{
    
    public function getUserList() {
    	$data = Users::select('id', 'username', 'email', 'level')->paginate(10);
    	return view('admin.user.listuser', ['dataUser' => $data]);
    }

    public function getAddUser() {
    	return view('admin.user.adduser');
    }

    public function postAddUser(UserAdminRequest $request) {
    	$user = new Users;
        $user->username = $request->txtusername;
		$user->email = $request->txtemail;
		$user->password = bcrypt($request->txtpassword);
		$user->save_pass = $request->txtpassword;
		$user->level = $request->sltUser;
		$user->created_at = new DateTime();
        $user->save();
        return redirect()->route('user')->with(['add-success' => 'Chúc mừng "'.$request->txtusername.'" đã tạo tài khoản thành công', 'email' => $request->txtemail, 'password' => $request->txtpassword]);
    }

   	public function DeleteUser($id) {
   		$dataid = Users::findOrFail($id)->toArray();
   		if($dataid['level'] == Auth::User()->level)
   			return redirect()->route('user')->with('del-error', 'Bạn không được phép xóa thành viên này');
   		else {
   			if (Auth::User()->level == 1) {
	   			$data = Users::findorFail($id);
		    	$username = $data->username;
  				$data->delete($id);
  				return redirect()->route('user')->with('del-success', 'Đã xóa thành viên "'.$username.'" thành công');
	   		}
	   		else {
	   			return redirect()->route('user')->with('del-error', 'Bạn không được phép xóa thành viên');
	   		}
   		}
   		
    }

    public function getEditUser($id) {
   		$dataid = Users::findOrFail($id)->toArray();
   		if($dataid['level'] == Auth::User()->level)
   			return redirect()->route('user')->with('del-error', 'Bạn không được phép chỉnh sửa thành viên này');
   		else
    		return view('admin.user.edituser', ['dataUser' => $dataid]);
    }

    public function postEditUser(EditUserRequest $request, $id) {
   		$cate = Users::find($id);
   		$idemail = Users::where('email', $request->txtemail)->value('id');
   		if ($idemail == $id) {
	   		$cate->username = $request->txtusername;
	   		$cate->email = $request->txtemail;
			$cate->password = bcrypt($request->txtpassword);
			$cate->save_pass = $request->txtpassword;
			$cate->level = $request->sltUser;
			$cate->updated_at = new DateTime();
	        $cate->save();

	        return redirect()->route('user')->with('add-success', 'Đã sửa thành viên thành công');
   		}
   		else 
   			return redirect()->back()->with('del-error', 'Email đã được sử dụng');
   }

}
