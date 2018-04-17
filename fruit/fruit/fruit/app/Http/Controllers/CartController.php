<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use Session;
use App\detailcategory;
use App\product;
use App\Cart;
use App\order;
use DateTime;
use App\orderdetail;
class CartController extends Controller
{
    public function addCart(Request $req,$id,$countProduct){
        $product = product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        for( $i = 0 ;$i<$countProduct;$i++){
            $cart->add($product, $id);
        }
        $req->session()->put('cart',$cart);
        // $result = array( 'product' => $product, 'cart' => $cart );
        return response()->json(compact('product','cart'));
    }
    public function subCart(Request $req,$id,$countProduct){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        for( $i = 0 ;$i<$countProduct;$i++){
            $cart->reduceByOne($id);
        }
        $req->session()->put('cart',$cart);
        // $result = array( 'product' => $product, 'cart' => $cart );
        return response()->json(compact('cart'));
    }
    public function removeAllProduct(Request $req,$id){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        $req->session()->put('cart',$cart);
        // $result = array( 'product' => $product, 'cart' => $cart );
        return redirect()->back();
    }
    public function getCartShop(){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return response()->json($cart);
        return view('pages.cartshop',compact('cart'));
      }
      public function getPayProduct(){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('pages.payproduct',compact('cart'));
      }
      public function successPayment(Request $req){
        $this->validate($req,[
            'namecustomer'=>'required',
            'address'=>'required',
            'phonenumber'=>'required',
          ],[
            'namecustomer.required'=>'Bạn chưa nhập tên tài khoản',
            'address.required'=>'Bạn chưa nhập địa chỉ',
        
            'phonenumber.required'=>'Bạn chưa nhập SĐT',
          ]);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);

        $newOder = new order();
        if($cart->totalQty > 0 ){
            $newOder->quanlity = $cart->totalQty;
            $newOder->totalprice = $cart->totalPrice;
            $newOder->namecustomer =  ($req->namecustomer == null)?"":$req->namecustomer;
            $newOder->address = ($req->address == null)?"":$req->address;
            $newOder->phonenumber = ($req->phonenumber == null)?"":$req->phonenumber;
            $newOder->status = false;
            $datetime = new DateTime();
            $newOder->created_at =$datetime->format('d\-m\-Y');
            $newOder->save();
            foreach($cart->items as $key){
                $item = $key['item'];
                $newoderdetail = new orderdetail();
                $newoderdetail->orderid = $newOder->id;
                $newoderdetail->productid = $item->id;
                $newoderdetail->quanlity = $key['qty'];
                $newoderdetail->price = $item->price;
                $newoderdetail->save();
            }
            $req->session()->put('cart',null);
            return redirect('/')->with('messageok','Đặt hàng thành công');
        } else {
            return redirect()->back()->with('message','Bạn chưa có đơn hàng');
        }

      }
}
