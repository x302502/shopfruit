@extends('admin.layout.master')
@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Sản Phẩm
            <small>Thêm</small>
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

          <form action="admin/product/them" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <label>Chọn loại</label>
              <select class="form-control" name="detailcategoryid" id="detailcategoryid">
                @foreach ($keys as $key)
                  <option value="{{$key->id}}">{{$key->detailcategoryname}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Tên sản phẩm</label>
              <input class="form-control" name="ten" placeholder="Điền tên sản phẩm..." />
            </div>
            <div class="form-group">
              <label style="display:block">Giá</label>
              <input class="form-control" name="gia" placeholder="Điền giá sản phẩm..." style="width:70%;display:inline-block"/>
              <label style="display:inline-block">.000 VNĐ</label>
            </div>
            <div class="form-group">
              <label>Trạng thái</label>
              <select  name="trangthai" class="form-control">
                <option  value="Hết hàng"  >Hết hàng</option>
                <option value="Còn hàng" selected="selected">Còn hàng</option>
              </select>
            </div>
            <div class="form-group">
              <label>Loại</label>
              <select  name="loai" class="form-control">
                <option  value="Loại 1" selected="selected" >Loại 1</option>
                <option value="Loại 2" >Loại 2</option>
                <option value="Dạc" >Dạ</option>
              </select>
            </div>
            <div class="form-group">
              <label>Mô tả</label>
              <input class="form-control" name="mota" placeholder="Điền mô tả..." />
            </div>
            <div class="form-group">
                <label>Hình ảnh</label>
                <input type="file" name="hinhanh">
            </div>
            <button type="submit" class="btn btn-default">Thêm</button>
            <button type="reset" class="btn btn-default">Làm mới</button>
            <form>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

{{--@section('script')--}}
  {{--<script>--}}
      {{--$(document).ready(function(){--}}
          {{--$("#tenkhoa").change(function(){--}}
            {{--var idkhoa=$(this).val();--}}
            {{--$.get("admin/ajax/detailcategory/"+idkhoa,function(data){--}}
              {{--// alert(data);--}}
              {{--$("#tenmon").html(data);--}}
            {{--});--}}
          {{--});--}}
      {{--});--}}
  {{--</script>--}}
{{--@endsection--}}
