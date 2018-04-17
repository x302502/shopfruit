<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use App\product;
use App\detailcategory;
use App\comment;
class ProductController extends Controller
{
    public function getDanhsach()
    {
        $temp=product::all();
        return view('admin.product.danhsach',compact('temp'));
    }
    public function getThem(){
        $keys=detailcategory::all();
        return view('admin.product.them',compact('keys'));
    }
    public function postThem(Request $req){
       $this->validate($req,[
           'ten'=>'required|min:3|max:255',
           'gia'=>'required',
           'trangthai'=>'required',
           'loai'=>'required',
           'mota'=>'required',
           'hinhanh'=>'required'
       ],[
           'ten.required'=>'Bạn chưa nhập tên sản phẩm',
           'ten.min'=>'Tên phải ít nhất 3 kí tự',
           'ten.max'=>'Tên bạn nhập quá dài quá 255 kí tự',

           'gia.required'=>'Bạn chưa nhập giá',
           'trangthai.required'=>'Bạn chưa điền trạng thái',
           'loai.required'=>'Bạn chưa điền loại ',
           'mota.required'=>'Bạn chưa nhập mô tả',
           'hinhanh.required'=>'Bạn chưa chọn hình ảnh'
       ]);
        $key=new product;
        $key->detailcategoryid=$req->detailcategoryid;
        $key->productname=$req->ten;
        $key->price=$req->gia;
        $key->status=$req->trangthai;
        $key->type=$req->loai;
        $key->description=$req->mota;
        if($req->hasFile('hinhanh'))
        {
            $file=$req->file('hinhanh');
            $name = $file->getClientOriginalName();
            $new_name=str_random(4)."_".$name;
            printf($name);
            while(file_exists("img/".$new_name))
            {
                $new_name=str_random(4)."@". $name;
            }
            $file->move("img/",$new_name);
            $key->picture=$new_name;
        }
        else {
            $key->picture="hu.jpg";
        }
        $key->save();
        return redirect('admin/product/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
        $keys=product::find($id);
        $cates=detailcategory::all();
        return view('admin.product.sua',compact('keys','cates'));
    }
    public function postSua(Request $req,$id){
      $this->validate($req,[
          'ten'=>'required|min:3|max:255',
          'gia'=>'required',
          'trangthai'=>'required',
          'loai'=>'required',
          'mota'=>'required',

      ],[
          'ten.required'=>'Bạn chưa nhập tên sản phẩm',
          'ten.min'=>'Tên phải ít nhất 3 kí tự',
          'ten.max'=>'Tên bạn nhập quá dài quá 255 kí tự',

          'gia.required'=>'Bạn chưa nhập giá',
          'trangthai.required'=>'Bạn chưa điền trạng thái',
          'loai.required'=>'Bạn chưa điền loại ',
          'mota.required'=>'Bạn chưa nhập mô tả',

      ]);
        $key=product::find($id);
        $key->detailcategoryid=$req->detailcategoryid;
        $key->productname=$req->ten;
        $key->price=$req->gia;
        $key->status=$req->trangthai;
        $key->type=$req->loai;
        $key->description=$req->mota;
        if($req->hasFile('hinhanh'))
        {
            $file=$req->file('hinhanh');
            $name = $file->getClientOriginalName();
            $new_name=str_random(4)."_".$name;
            while(file_exists("img/".$new_name))
            {
                $new_name=str_random(4)."@". $name;
            }
            $file->move("img/",$new_name);
            $key->picture=$new_name;
        }
        // else {
        //     $key->picture="hu.jpg";
        // }
        $key->save();
        return redirect('admin/product/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {
        $key=product::find($id);
        $listCommnet = comment::where('productid',$id)->get();
        foreach ($listCommnet as $comm){
            $comm->delete();
        }
        $key->delete();
        return redirect('admin/product/danhsach/');
    }
}
