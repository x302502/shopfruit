@extends('master')
@section('body')
  {{-- modal --}}
  @include('layouts.modal')

  <div class="body-content">
    @include('layouts.search')
    <div class="space-color"></div>

    <div class="menu-left-body">
    @include('layouts.menu_left_body')

      <div class="content-body">
        <p class="header-text-body">Tìm thấy {{count($search)}} kết quả </p>


        <div class="list-product">
          @foreach ($search as $key)
          <div class="frame-product">
            <a href="detailproduct/{{$key->id}}" >
              <img  style="width:100%;" src="img/{{$key->picture}}" alt="">
              <div class="space5"></div>
              <div class="content">
                  <p class="txt-name">{{$key->productname}}</p>
                  <p class="txt-price">{{$key->detailcategory->detailcategoryname}} : {{$key->price*1000}} <span>Đ/KG</span></p>
              </div>
            </a>
            <div class="frame-btn-addShopcart" id="hide">
              <button id="show" class="btn-addShopcart" type="button" name="button" onclick="addCart({{$key->id}},1)" >Thêm giỏ hàng</button>
            </div>
          </div>
        @endforeach
        </div>


        <div class="pagination-content" style="height:3vmax;width:100%">

        </div>
      </div>

    </div>
  </div>

@endsection
