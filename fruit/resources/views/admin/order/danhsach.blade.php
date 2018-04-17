@extends('admin.layout.master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chi tiết hóa đơn
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
                        <th>Tên khách hàng</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order as $key)
                        <tr class="odd gradeX" align="center">
                            <td>{{$key->id}}</td>
                            <td>{{$key->namecustomer}}</td>
                            <td>{{$key->phonenumber}}</td>
                            <td>{{$key->address}}</td>
                            <td>{{$key->quanlity}}</td>
                            <td>{{$key->totalprice*1000}}</td>
                            <?php
                              $temp=($key->status)?"Đã duyệt":"Chờ duyệt";
                             ?>
                            <td>{{$temp}}</td>
                            <td>{{$key->created_at}}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/order/sua/{{$key->id}}">Duyệt trạng thái</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
            <!-- /.row -->
            <a type="button" name="button">Báo cáo</a>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
