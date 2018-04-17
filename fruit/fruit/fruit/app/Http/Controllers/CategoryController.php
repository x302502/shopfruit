<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\detailcategory;
use App\product;
class CategoryController extends Controller
{

    public function getDanhsach(){
      $cate=category::all();
      return view('admin.category.danhsach',compact('cate'));
    }


    public function getSua($id){
      $cate=category::find($id);
      return view ('admin.category.sua',compact('cate'));
    }
    public function postSua($id,Request $req){
      $cate=category::find($id);
      $this->validate($req,[
            'ten'=>'required|unique:category,categoryname|min:3|max:255'
          ],[
            'ten.required'=>'Bạn chưa nhập tên thể loại',
            'ten.unique'=>'Tên thể loại bị trùng',
            'ten.min'=>'Tên phải lớn hơn 3 kí tự',
            'ten.max'=>'Tên thể loại quá dài',
      ]);
      $cate->categoryname=$req->ten;
      $cate->save();
      return redirect('admin/category/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getThem(){
      return view('admin.category.them');
    }
    public function postThem(Request $req){
        $this->validate($req,[
              'ten'=>'required|unique:category,categoryname|min:3|max:255'
            ],[
              'ten.required'=>'Bạn chưa nhập tên thể loại',
              'ten.unique'=>'Tên thể loại bị trùng',
              'ten.min'=>'Tên phải lớn hơn 3 kí tự',
              'ten.max'=>'Tên thể loại quá dài',
        ]);
        $key=new category;
        $key->categoryname=$req->ten;
        $key->save();
        return redirect('admin/category/them')->with('thongbao','Thêm thành công');

    }

    public function getXoa($id)
    {
      $key=category::find($id);
      //return response()->json($key);
        $listDetailCategory = detailcategory::where('categoryid',$id)->get();
        //return response()->json($listDetailCategory);
        foreach($listDetailCategory as $itemDetailCategory) {
          $listProduct = product::where('detailcategoryid',$itemDetailCategory->id)->get();
          //return response()->json($listProduct);
          foreach($listProduct as $itemProduct) {
            $itemProduct->delete();
          }
          $itemDetailCategory->delete();
        }
        $key->delete();
        return redirect('admin/category/danhsach')->with('thongbao','Xóa thành công');

    }
}
