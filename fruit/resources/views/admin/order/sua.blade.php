@extends('admin.layout.master')
@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Duyệt trạng thái :
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

                <form action="admin/order/sua/{{$keys->id}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <select class="form-control" name="status">
                        @if  ($keys->status)
                          <option value="1" selected="selected" >Da duyet</option>
                          <option value="0"  >chua duyet</option>
                        @else
                          <option value="1"  >Da duyet</option>
                          <option value="0" selected="selected" >chua duyet</option>

                        @endif
                    </select>
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
