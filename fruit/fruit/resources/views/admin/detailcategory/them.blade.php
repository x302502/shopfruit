@extends('admin.layout.master')
@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Chi tiết thể loại
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

          <form action="admin/detailcategory/them" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <label>Chi tiết thể loại</label>
              <select class="form-control" name="theloai">
                @foreach ($cate as $key)
                  <option value="{{$key->id}}">{{$key->categoryname}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Tên môn</label>
              <input class="form-control" name="ten" placeholder="Điền tên môn học..." />
            </div>
            <button type="submit" class="btn btn-default">Thêm</button>
            <button type="reset" class="btn btn-default">Làm mới</button>
          </form>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
