@extends('admin.layout.master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Comment
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->

                {{--@if(session('thongbao'))--}}
                    {{--<div class="alert alert-success">--}}
                        {{--{{session('thongbao')}}--}}
                    {{--</div>--}}
                {{--@endif--}}
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Tên người dùng</th>
                        <th>Nội dung</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($temp as $key)
                        <tr class="odd gradeX" align="center">
                            <td>{{$key->id}}</td>
                            <td>{{$key->comment_product->productname}}</td>
                            <td>{{$key->comment_user->username}}</td>
                            <td>{{$key->content}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$key->id}}">Xóa</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
