@extends('admin.layout.master')
@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Thể loại
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
                      <tr align="center">``
                          <th>ID</th>
                          <th>Tên thể loại</th>
                          <th>Xóa</th>
                          <th>Sửa</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($cate as $key)
                      <tr class="odd gradeX" align="center">
                          <td>{{$key->id}}</td>
                          <td>{{$key->categoryname}}</td>
                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/category/xoa/{{$key->id}}">Xóa</a></td>
                          <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/category/sua/{{$key->id}}">Sửa</a></td>
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
