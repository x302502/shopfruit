@extends('master')
@section('body')
  <div class="background-body">
    <div class="content-login">
      <div class="container">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <div class="space50"></div>
          @if (session('thongbao'))
            <div class="alert alert-danger" style="text-align:center;width:40%;margin-left:30%">
              {{session('thongbao')}}
            </div>
          @else
            <div class="space30"></div>
          @endif
          <form  class="" action="login" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <h3 class="txt-login font-text"><b>Đăng nhập</b></h3>
            <div class="space40">
            </div>

            <div class="row">
              <div class="col-md-1"></div>

              <div class="col-md-10">
                <div class="frame-login" >

                  <div class="img-user-login" >
                    <img src="img/profile.svg" alt="" style="width:100%;">
                  </div>

                  <div class="frame-input-login" >
                    <input class="input-login" id="username" name="username" type="text"  placeholder=" Tên tài khoản của bạn">
                  </div>
                </div>
                <div style="color: white;padding-top:10px;">
                  @if (count($errors)>0)
                    {{$errors->getBag('default')->first('username')}}
                  @endif
                </div>

                <div class="space10"> </div>

                <div class="frame-login" >
                  <div class="img-user-login" >
                    <img src="img/password.svg" alt="" style="width:100%;">
                  </div>
                  <div class="frame-input-login" >
                    <input class="input-login" id="password"  name="password" type="password"  placeholder="Mật khẩu">
                  </div>
                </div>
                <div style="color: white;height: 10px;margin-top:10px;">
                  @if (count($errors)>0)
                    {{$errors->getBag('default')->first('password')}}
                  @endif
                </div>

                <div class="space10"></div>
                <button type="submit" class="btn btn-lg btn-success" style="margin-left:35%;">Đăng nhập</button>
                <div class="space10"></div>
              </div>

              <div class="col-md-1"></div>
            </div>

            <div class="space30">
            </div>
          </form>
        </div>
        <div class="col-md-3">

        </div>
      </div>

    </div>
  </div>

@endsection
