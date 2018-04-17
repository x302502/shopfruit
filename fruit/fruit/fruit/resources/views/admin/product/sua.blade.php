@extends('admin.layout.master')
@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Sản phẩm:
            <small>{{$keys->productname}}</small>
          </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
          @if (count($errors)>0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                  {{$err}}<br>
                @endforeach
            </div>
          @endif

          @if(session('thongbao'))
          <div class="alert alert-success">
            {{session('thongbao')}}
          </div>
          @endif

          <form action="admin/product/sua/{{$keys->id}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <label>Loại sản phẩm</label>
              <select class="form-control" name="detailcategoryid">
                @foreach ($cates as $key)
                  <option
                  @if($keys->id==$key->id)
                    {{"selected"}}
                  @endif
                  value="{{$key->id}}">{{$key->detailcategoryname}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Tên sản phẩm</label>
              <input class="form-control" name="ten" value="{{$keys->productname}}" />
            </div>
            <div class="form-group">
              <label>Giá</label>
              <input class="form-control" name="gia" value="{{$keys->price}}" />
            </div>
            <label>Giá</label>
            <select class="form-control" name="trangthai">
                  <option value="Hết hàng" selected="selected" >Hết hàng</option>
                  <option value="Còn hàng"  >Còn hàng</option>
            </select>
              <label>Loại</label>
              <select class="form-control" name="loai">
                    <option value="Loại 1" selected="selected" >Loại 1</option>
                    <option value="Loại 2"  >Loại 2</option>
                    <option value="Dạc"  >Dạc</option>
              </select>
            <div class="form-group">
              <label>Mô tả</label>
                <input class="form-control" name="mota" value="{{$keys->description}}" />
            </div>
            <div class="form-group">
                <label>Hình ảnh</label>
                <input type="file" name="hinhanh">
                <img style="margin-top:20px;width:200px;height:170px;"src="img/{{$keys->picture}}" alt="">
            </div>
            <button type="submit" class="btn btn-default">Sửa</button>
            <button type="reset" class="btn btn-default">Làm mới</button>
            </form>
            </div>
          </div>
    </div>
  </div>
@endsection
