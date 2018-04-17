@extends('master')
@section('body')
  <div class="body-content">
    <div class="frame-cartshop">
      <div class="space10"></div>
      {{-- begin carshopleft --}}
      <div class="cartshop-left">

        <div class="title-cartshop font-text">
          <div class="title-cartshop-left">
            <p>sản phẩm</p>
          </div>
          <div class="title-cartshop-center">
            <p>Gía</p>
          </div>
          <div class="title-cartshop-right">
            <p>Số lượng</p>
          </div>
        </div>

        <div class="space5" style="display:inline-block"></div>
        {{-- begin --}}
        @if($cart->totalQty >0 )
        @foreach($cart->items as $key)
        <div class="frame-content-cartshop">
          <?php
            $item = $key['item'];
            $detailcategoryid = $item->detailcategoryid;
            $detailcategoryname = DB::table('detailcategory')->find($detailcategoryid)->detailcategoryname;

          ?>
          <div class="title-cartshop-left-content">
            <div class="frame-img-title-cartshop-left">
              <img class="img-title-cartshop-left" src="img/{{$item->picture}}" alt="" >
            </div>
            <div class="txt-title-cartshop-left">
              <ul>
                <li class="font-text-cartshop">{{$item->productname}}</li>

              <li class="font-text-cartshop">Mặt hàng:{{$detailcategoryname}} </li>
                <li>
                  <div class="space5" style="border-bottom:1px solid silver"></div>
                <a class="btn-cartshop" type="button" href="removeAllProduct/{{$item->id}}">
                    <img class="img-delete-cartshop" src="img/rubbish-bin.svg" alt="" >
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <div class="title-cartshop-center-p">
            <p class="title-cartshop-center-txt">{{$item->price * 1000}} Đ/KG</p>
          </div>

          <div class="title-cartshop-right">
            <div>
              <button type="button" class="buttonSub" onclick = "subCart({{$item->id}})">-</button>
            <input  value="{{$key['qty']}}" class="quantity" id="quantityCart{{$item->id}}">
              <button type="button" class="buttonSum" onclick="sumCart({{$item->id}})">+</button>
            </div>
          </div>

        </div>
        @endforeach
        @endif
        {{-- end --}}
      </div>
      {{-- end cartshopleft --}}
      <div class="cartshop-right">
        <div class="" style="width:100%;display:inline-block">

          <span class="txt-header-cartshop-right">Thông tin đơn hàng</span>
          <div class="space10"></div>

          <div class="frame-title-price-name-cartshop-right">
          <p class="title-price-name-cartshop-right" >Tổng tiền ( <strong id="totalQtyCartShop">{{$cart->totalQty}}</strong> sản phẩm)</p>
          </div>

          <div class="frame-txt-price-cartshop-right" style="width:40%;display:inline-block">
          <span id="totalPriceCartShop" class="txt-price-cartshop-right">{{$cart->totalPrice * 1000}}</span>
          </div>
          <div class="space10"></div>
          <div class="frame-btn-addShopcart" style="width:100%" align="center">
            <a href="payproduct" class="btn-addShopcart" type="button" name="button">THANH TOÁN</a>
            <div class="space10"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
