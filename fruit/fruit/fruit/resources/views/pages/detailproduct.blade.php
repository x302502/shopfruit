@extends('master')
@section('body')
 {{-- modal --}}
 @include('layouts.modal')
  <div class="body-content">
    @include('layouts.search')
    <div class="space-color"></div>
    <div class="frame-detailproduct">
      <div class="frame-img-detailproduct">
        <img class="img-detailproduct" src="img/{{$dt_product->picture}}" alt="" >
      </div>
      <div class="content-detailproduct">
        <p class="content-detailproduct-name">{{$dt_product->productname}}</p>
        <div class="content-detailproduct-first font-text" style="">
          <p>Tình trạng :</p>
          <p>Gía :</p>
          <p>Số Kg :</p>
        </div>

        <div class="content-detailproduct-second font-text" style="">
          <p style="font-weight:bold">{{$dt_product->status}}</p>
          <p style="font-size:1.5vmax;color:orange;">{{$dt_product->type}} : {{$dt_product->price*1000}} Đ/KG</p>
          <div>
            <button type="button" class="buttonSub" id="buttonSub">-</button>
            <input  value="0" class="quantity" id="quantity">
            <button type="button" class="buttonSum" id="buttonSum">+</button>
          </div>
        </div>
        <div class="btn-detailproduct">
          <button  class="btn-addShopcart" type="button" name="button" onclick="addMultipleProduct({{$dt_product->id}})">Thêm giỏ hàng</button>
        </div>
        <div class="font-text" style="display:inline-block">
          <p style="display:inline">Mô tả:</p>
          <p class="font-text-detailproduct" style="">
            {{$dt_product->description}}
         </p>
        </div>
      </div>
    </div>
  </div>
  <div class="space50" style="border-bottom: 1px solid silver;display:block"></div>

  <div class="general-detailproduct">
    <div class="space30"></div>
    <p class="text-general-detailproduct font-text">Sản phẩm liên quan</p>
    <div class="space10"></div>


    <div class="list-product" style="margin-left:10%;margin-right:10%">
          @foreach ($dt_gener as $key)
            <div class="frame-product">
              <a href="detailproduct/{{$key->id}}" >
                <img  style="width:100%;" src="img/{{$key->picture}}" alt="">
                <div class="space5"></div>
                <div class="content">
                  <p class="txt-name">{{$key->productname}}</p>
                  <p class="txt-price">{{$key->type}} : {{$key->price*1000}} <span>Đ/KG</span></p>
                </div>
              </a>

              <div class="frame-btn-addShopcart" id="hide">
                <button id="show" class="btn-addShopcart" type="button" name="button" onclick="addCart({{$key->id}},1)">Thêm giỏ hàng</button>
              </div>

            </div>
          @endforeach
        </div>
  </div>





  <div class="space10"></div>
  @foreach ($dt_comment as $key)
    <hr>
    <div class="" style="margin-left:10%;margin-right:10%;">
      <div class="media">
        <div class="media-body frame-comment">
          <?php
          $tentk=DB::table('users')->where('id',$key->userid)->first();
          ?>
          <h4 class="media-heading" style="color:blue;font-size:15px;display:inline-block;float:left">
            {{$tentk->username}}
          </h4>
          <div class="" style="">
            <small style="font-size:10px;margin-left:3%">{{$key->content}}</small>
          </div>
        </div>
      </div>
    </div>

  @endforeach
<div class="space10">

</div>
  <h4 class="container">Bình luận<span class="glyphicon glyphicon-pencil"></span></h4>
  <form action="comment/{{$dt_product->id}}" method="post" role="form" class="container">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <div class="form-group">
      <textarea class="form-control" name="ndbinhluan" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Gửi</button>
  </form>






@endsection
