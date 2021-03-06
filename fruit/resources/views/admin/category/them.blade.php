@extends('admin.layout.master')
@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Thể loại:
            <small>Thêm</small>
          </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
          {{-- @if (count($errors)>0)
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
          @endif --}}

          <form action="admin/category/them" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <label>Tên thể loại</label>
              <input class="form-control" name="ten" placeholder="Nhập tên thể loại.." />
            </div>
            <div style="color: red;margin-top:5px;margin-bottom:5px;font-size:1vmax">
              @if (count($errors)>0)
                  {{$errors->getBag('default')->first('ten')}}
              @endif
            </div>

            <button type="submit" class="btn btn-success">Thêm</button>
            <button type="reset" class="btn btn-success">Làm mới</button>
          </form>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
@endsection
