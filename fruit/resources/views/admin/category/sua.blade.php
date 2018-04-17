@extends('admin.layout.master')
@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Thể loại:
                      <small>{{$cate->categoryname}}</small>
                  </h1>
              </div>
              <!-- /.col-lg-12 -->
              <div class="col-lg-7" style="padding-bottom:120px">

                  <form action="admin/category/sua/{{$cate->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <div class="form-group">
                          <label>Tên thể loại</label>
                          <input class="form-control" name="ten" placeholder="Điền tên thể loại.."
                          value="{{$cate->categoryname}}"/>
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
