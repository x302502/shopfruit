<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

use App\admin;
class AdminController extends Controller
{


  // public function getdangki(){
  //   return view('admin.dangkiAdmin');
  // }
  // public function postdangki(Request $req){
  //   $this->validate($req,[
  //     'username'=>'required|min:3|unique:users,username',
  //     'password'=>'required|min:3|max:32',
  //   ],[
  //     'username.required'=>'Bạn chưa nhập tên tài khoản',
  //     'username.min'=>'Tên tài khoản phải lón hơn 3 kí tự',
  //     'username.min'=>'Tên tài khoản đã tồn tại',
  //
  //     'password.required'=>'Bạn chưa nhập mật khẩu',
  //     'password.min'=>'Mật khẩu phải lớn hơn 3 kí tự',
  //     'password.max'=>'Mật khẩu phải nhỏ hơn 32 k1i tự',
  //
  //     'rep_password.required'=>'Bạn chưa nhập lại mật khẩu',
  //     'rep_password.same'=>'Mật khẩu không trùng khớp',
  //
  //   ]);
  //   $ad=new admin;
  //   $ad->username=$req->username;
  //   $ad->password=$req->password;
  //   $ad->save();
  //   return redirect('dangki')->with('thongbao','Chúc mừng bạn đăng ký thành công');
  // }

  public function getLoginAdmin(){
    return view('admin.loginAdmin');
  }

  public function postLoginAdmin(Request $req){
    $us=admin::all();
    $this->validate($req,[
      'usernameAdmin'=>'required',
      'passwordAdmin'=>'required|min:3|max:32'
    ],[
      'usernameAdmin.required'=>'Bạn chưa nhập tên tài khoản',
      'passwordAdmin.required'=>'Bạn chưa nhập mật khẩu',
      'passwordAdmin.min'=>'Mật khẩu phải lớn hơn 2 kí tự',
      'passwordAdmin.max'=>'Mật khẩu nhỏ hơn 32 kí tự'
    ]);
    $ua=$req->usernameAdmin;
    $pa=$req->passwordAdmin;

    foreach ($us as $key) {
      if($key->username==$ua&&$key->password==$pa){
        return redirect('admin/user/danhsach');
      }
      else {
        echo "sai";
      }
    }
  }
  public function getLogOut(){
    return redirect('admin');
  }

}
