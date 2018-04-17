<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;

class OrderController extends Controller
{
    //
    public function getDanhsach(){
      $order=order::all();
      return view('admin.order.danhsach',compact('order'));
    }
    public function getSua($id){
        $keys=order::find($id);
        return view('admin.order.sua',compact('keys'));
    }
    public function postSua(Request $req,$id){
        $key=order::find($id);
        $key->status=$req->status;
        $key->save();
        return redirect('admin/order/sua/'.$id)->with('thongbao','Sửa thành công');
    }
}
