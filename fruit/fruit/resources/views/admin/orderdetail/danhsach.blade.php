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
                        <th>Mã hóa đơn</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Gía</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orderDetail as $key)
                        <tr class="odd gradeX" align="center">
                            <td>{{$key->id}}</td>
                            <td>{{$key->orderid}}</td>
                            <?php 
                                $item =  DB::table('product')->where('id',$key->productid)->first();
                                $productName  = isset($item)?$item->productname:"Sản phẩm đã xóa";
                            ?>
                            <td>{{$productName}}</td>
                            <td>{{$key->quanlity}}</td>
                            <td>{{$key->price*1000}}</td>
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
