@extends('admin.layout.master')
@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Tài khoản:
                      <small>Danh sách</small>
                  </h1>
              </div>
              <!-- /.col-lg-12 -->

              @if(session('thongbao'))
              <div class="alert alert-success">
                {{session('thongbao')}}
              </div>
              @endif

              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr align="center">
                          <th>ID</th>
                          <th>Họ tên</th>
                          <th>Tài khoản</th>
                          <th>SĐT</th>
                          <th>Email</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($us as $key)
                      <tr class="odd gradeX" align="center">
                          <td>{{$key->id}}</td>
                          <td>{{$key->name}}</td>
                          <td>{{$key->username}}</td>
                          <td>{{$key->phonenumber}}</td>
                          <td>{{$key->email}}</td>
                      </tr>
                    @endforeach

                  </tbody>
              </table>
          </div>
          <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
@endsection
