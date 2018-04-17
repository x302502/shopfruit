<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orderdetail;

class OrderDetailController extends Controller
{
    //
    public function getDanhsach(){
      $orderDetail=orderdetail::all();
      return view('admin.orderdetail.danhsach',compact('orderDetail'));
    }
}
