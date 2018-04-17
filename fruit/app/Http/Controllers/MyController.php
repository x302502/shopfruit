<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

use App\category;
use App\detailcategory;
use App\product;
use App\User;
use App\comment;

class MyController extends Controller
{
  //khởi tạo dữ liệu
  function __construct(){
    $category=category::all();
    $product=product::paginate(6);
    $user=User::all();
    view()->share('category',$category);  //truyen du lieu chung
    view()->share('product',$product);
    view()->share('user',$user);
  }
  //

  //trang home
  public function getIndex(){
    $category=category::all();
    $detailcategory=detailcategory::all();
    $user=user::all();
    return view('layouts.body',compact('category','detailcategory','user'));
  }
  //

  //trang danh sách loại SP và tất cả loại SP
  public function getListDetailCategory($id){
    $dt_cate=detailcategory::find($id);
    if(isset($dt_cate)) {
      return view('layouts.list_detailcategory',compact('dt_cate'));
    } else {
      return redirect('/');
    }

  }
  public function getDetailProduct(Request $req, $id){
    //return response()->json($req->path());

    $dt_product=product::find($id);
    if (isset($dt_product)){
      $dt_comment=comment::where('productid',$id)->get();
      $dt_gener=product::where('detailcategoryid',$dt_product->detailcategoryid)->take(3)->get();
      return view('pages.detailproduct',compact('dt_product','dt_gener','dt_comment'));
    } else {
      return redirect('/');
    }

  }

  //

  //đăng nhập
  public function getLogin(){
    return view('pages.login');
  }

  public function postLogin(Request $req){
    $this->validate($req,[
      'username'=>'required',
      'password'=>'required'
    ],
    [
      'username.required'=>'Bạn chưa nhập tên tài khoản',
      'password.required'=>'Bạn chưa nhập mật khẩu'
    ]);
    $temp= array('username'=>$req->username,'password'=>$req->password);
    if(Auth::attempt($temp)){
      return redirect('/');
    }
    else {
      return redirect()->back()->with('thongbao','Đăng nhập không thành công');
      // var_dump ($temp);
      // echo $req->username."<br>".$req->password;
    }
  }
  //

//đang ki
  public function getRegis(){
    return view('pages.regis');
  }
  public function postRegis(Request $req){
    $this->validate($req,[
      'username'=>'required|min:3|unique:users,username',
      'password'=>'required|min:3|max:32',
      're_password'=>'required|same:password',
      'name'=>'required',
      'email'=>'required|email|unique:users,email',
      'phonenumber'=>'required',
    ],[
      'username.required'=>'Bạn chưa nhập tên tài khoản',
      'username.min'=>'Tên tài khoản phải lón hơn 3 kí tự',
      'username.min'=>'Tên tài khoản đã tồn tại',

      'password.required'=>'Bạn chưa nhập mật khẩu',
      'password.min'=>'Mật khẩu phải lớn hơn 3 kí tự',
      'password.max'=>'Mật khẩu phải nhỏ hơn 32 k1i tự',

      're_password.required'=>'Bạn chưa nhập lại mật khẩu',
      're_password.same'=>'Mật khẩu không trùng khớp',

      'name.required'=>'Bạn chưa nhập họ và tên',

      'email.required'=>'Bạn chưa nhập email',
      'email.email'=>'Sai định dạng email',
      'email.unique'=>'Email đã tồn tại',

      'phonenumber.required'=>'Bạn chưa nhập SĐT',
    ]);
    $us=new User;
    $us->username=$req->username;
    // $us->password=bcrypt($req->password);
    $us->password=bcrypt($req->password);
    $us->name=$req->name;
    $us->email=$req->email;
    $us->phonenumber=$req->phonenumber;
    $us->save();
    return redirect('regis')->with('thongbao','Chúc mừng bạn đăng ký thành công');

  }
///

public function getLogout(){
  Auth::logout();
    return redirect('/');

}
/**/
public function getIntruction(){
  return view('pages.introduction');
}
public function getLocation(){
  return view('pages.location');
}
public function getUserinfor($id){
  $user=User::find($id);
  return view('pages.userinfor',compact('user'));
}
public function posttEditUserinfor(Request $req,$id){
  $this->validate($req,[
    'username'=>'required|min:3',
    'email'=>'required|email',
    'phonenumber'=>'required',
  ],[
    'username.required'=>'Bạn chưa nhập tên tài khoản',
    'username.min'=>'Tên tài khoản phải lón hơn 3 kí tự',
    'username.min'=>'Tên tài khoản đã tồn tại',

    'email.required'=>'Bạn chưa nhập email',
    'email.email'=>'Sai định dạng email',

    'phonenumber.required'=>'Bạn chưa nhập SĐT',
  ]);
  $us=User::find($id);
  // $us->username=$req->username;
  $us->name=$req->name;
  // $us->password=bcrypt($req->password);
  $us->email=$req->email;
  $us->phonenumber=$req->phonenumber;
  $us->save();
  return redirect('userinfor/'.$id)->with('thongbao','Chúc mừng bạn đổi thành công');
}
/**
 *
 */
 public function getSearch(Request $req){
  $search=product::join('detailcategory','product.detailcategoryid','=','detailcategory.id')
    ->join('category','detailcategory.categoryid','=','category.id')
    ->where('productname','like','%'.$req->key.'%')
    ->orwhere('detailcategoryname','like','%'.$req->key.'%')
    ->orwhere('categoryname','like','%'.$req->key.'%')
    ->select('product.*','detailcategory.detailcategoryname','category.categoryname')->get();
    return view('layouts.result_search',compact('search'));
 }
 /**
  *
  */
      public function postComment($id,Request $req){
        $this->validate($req,[
          'ndbinhluan'=>'required',

        ],[
          'ndbinhluan.required'=>'Bạn chưa nhập noi dung bình luận',
        ]);
        $nx=new comment;
        $nx->productid=$id;
        $nx->userid=Auth::user()->id;
        $nx->content=$req->ndbinhluan;
        $nx->save();
        return redirect("detailproduct/".$id)->with('thongbao', 'Bình luận thành công');
      }



}
