<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\detailcategory;
use App\category;
use App\product;
use App\comment;
class DetailCategoryController extends Controller
{
    //
    public function getDanhsach(){
      $dt_cate=detailcategory::all();
      return view('admin.detailcategory.danhsach',compact('dt_cate'));
    }
    public function getSua($id){
      $dt_cate=detailcategory::find($id);
      $cate=category::all();
      return view('admin.detailcategory.sua',compact('dt_cate','cate'));
    }
    public function postSua($id,Request $req){
      $key=detailcategory::find($id);
    $this->validate($req,[
          'ten'=>'required|min:3|max:255',
          'theloai'=>'required'
        ],[
          'ten.required'=>'Bạn chưa nhập tên chi tiết',
          'ten.min'=>'Tên phải lớn hơn 2 kí tự',
          'ten.max'=>'Tên bạn quá dài',
          'theloai.required'=>'Bạn chưa nhập tên thể loại',
    ]);
    $key->detailcategoryname=$req->ten;
    $key->categoryid=$req->theloai;
    $key->save();
    return redirect('admin/detailcategory/sua/'.$id)->with('thongbao','Sửa thành công');

    }
    public function getThem(){
      $cate=category::all();
      return view('admin.detailcategory.them',compact('cate'));
    }
    public function postThem(Request $req){
      $this->validate($req,[
            'ten'=>'required|unique:detailcategory,detailcategoryname|min:3|max:255',
            'theloai'=>'required'
          ],[
            'ten.required'=>'Bạn chưa nhập tên chi tiết thể loại',
            'ten.unique'=>'Tên này đã tồn tại',
            'ten.min'=>'Tên phải lớn hơn 3 kí tự',
            'ten.max'=>'Tên bạn quá dài',
            'khoa.required'=>'Bạn chưa nhập khoa',
      ]);
      $key=new detailcategory;
      $key->detailcategoryname=$req->ten;
      $key->categoryid=$req->theloai;
      $key->save();
      return redirect('admin/detailcategory/them')->with('thongbao','Thêm thành công');

    }
    public function getXoa($id){
      $key=detailcategory::find($id);
      $listProduct = product::where('detailcategoryid',$key->id)->get();
      foreach($listProduct as $itemProduct) {
        $listCommnet = comment::where('productid',$itemProduct->id)->get();
        foreach ($listCommnet as $comm){
            $comm->delete();
        }
        $itemProduct->delete();
      }
      $key->delete();
      return redirect('admin/detailcategory/danhsach')->with('thongbao','Xóa thành công');
    }

}
