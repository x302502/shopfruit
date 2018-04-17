@extends('admin.layout.master')
@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Chi tiết thể loại :
                      <small>{{$dt_cate->detailcategoryname}}</small>
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

                <form action="admin/detailcategory/sua/{{$dt_cate->id}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <div class="form-group">
                    <label>Chi tiết thể loại</label>
                    <select class="form-control" name="theloai">
                      @foreach ($cate as $key)
                        <option
                        @if($dt_cate->categoryid==$key->id)
                          {{"selected"}}
                        @endif
                        value="{{$key->id}}">{{$key->categoryname}}</option>
                      @endforeach
                    </select>
                  </div>
                    <div class="form-group">
                        <label>Tên chi tiết thể loại</label>
                        <input class="form-control" name="ten" placeholder="Điền tên chi tiết thể loại.."
                        value="{{$dt_cate->detailcategoryname}}"/>
                    </div>
                    <div style="color: red;margin-top:5px;margin-bottom:5px;font-size:1vmax">
                      @if (count($errors)>0)
                          {{$errors->getBag('default')->first('ten')}}
                      @endif
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                  </form>
              </div>
          </div>
          <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
@endsection
