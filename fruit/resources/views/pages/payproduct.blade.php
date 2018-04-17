
@extends('master')
@section('body')
@if (session('message'))
<script>
    alert("Bạn chưa có đơn hàng nào");
</script>
@endif
  <form class="body-content" action="successPayment" method="GET">
    <div class="frame-cartshop">
      <div class="space10"></div>
      {{-- begin carshopleft --}}
      <div class="cartshop-left">

        <div class="detail-payproduct">
          <br>
          <span class="txt-header-cartshop-right">Thông tin giao hàng</span>
          <div class="space10"></div>
          <div class="frame-detail-payproduct">
            <label class="title-payproduct">Tên</label>
            <input class="input-payproduct" type="text" name = "namecustomer" placeholder="Họ Tên" data-meta="Field" value="">

            <div style="color: red;margin-top:5px;margin-bottom:5px;font-size:1vmax">
              @if (count($errors)>0)
                  {{$errors->getBag('default')->first('namecustomer')}}
              @endif
            </div>

          </div>

          <div class="frame-detail-payproduct">
            <label class="title-payproduct">Số điện thoại</label>
            <input class="input-payproduct" type="text" name = "phonenumber" placeholder="Vui lòng nhập số điện thoại" data-meta="Field" value="">
            <div style="color: red;margin-top:5px;margin-bottom:5px;font-size:1vmax">
                @if (count($errors)>0)
                    {{$errors->getBag('default')->first('phonenumber')}}
                @endif
              </div>
          </div>

          <div class="frame-detail-payproduct">
            <label class="title-payproduct">Địa chỉ nhận hàng</label>
            <input class="input-payproduct" type="text" name = "address"  placeholder="Vui lòng nhập đầy đủ địa chỉ nhà" data-meta="Field" value="">
            <div style="color: red;margin-top:5px;margin-bottom:5px;font-size:1vmax">
            @if (count($errors)>0)
              {{$errors->getBag('default')->first('address')}}
            @endif
          </div>
          </div>
          <br>

        </div>

        <div class="space10"></div>

        <div class="title-cartshop font-text">
          <div class="title-cartshop-left">
            <p>Sản phẩm</p>
          </div>
          <div class="title-cartshop-center">
            <p>Gía</p>
          </div>
          <div class="title-cartshop-right">
            <p>Số Kg</p>
          </div>
        </div>

        <div class="space5" style="display:inline-block"></div>
        {{-- begin --}}
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
            <input  value="{{$key['qty']}}" class="quantity" id="quantityCart">
              <button type="button" class="buttonSum" onclick="sumCart({{$item->id}})">+</button>
            </div>
          </div>

        </div>
        @endforeach
        @endif
        {{-- end --}}
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
          <div class="" style="width:100%" align="center">
            <button class="btn-addShopcart" type="submit" name="button">Tiến hành đặt hàng</button>
            <div class="space10"></div>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
