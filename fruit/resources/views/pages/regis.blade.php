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
          <form action="regis" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <h3 class="txt-login font-text"><b>Đăng Ký</b></h3>
            <div class="space40">
            </div>

            <div class="row">
              <div class="col-md-1">

              </div>
              <div class="col-md-10" style="margin-left:6px;margin-right:6px;">
                <div class="frame-login" >
                  <div class="img-user-login" >
                    <img src="img/profile.svg" alt="" style="width:100%;">
                  </div>
                  <div class="frame-input-login" >
                    <input class="input-login" id="username" type="text"  name="username" placeholder="Tên Tài Khoản">
                  </div>
                </div>
                <div style="color: white;padding-top:10px;">
                  @if (count($errors)>0)
                      {{$errors->getBag('default')->first('username')}}
                  @endif
                </div>

                <div class="space10"></div>

                <div class="frame-login" >
                  <div class="img-user-login" >
                    <img src="img/password.svg" alt="" style="width:100%;">
                  </div>
                  <div class="frame-input-login" >
                    <input class="input-login" id="password" type="password"  name="password" placeholder="Mật khẩu">
                  </div>
                </div>
                <div style="color: white;padding-top:10px;">
                  @if (count($errors)>0)
                      {{$errors->getBag('default')->first('password')}}
                  @endif
                </div>

                <div class="space10"></div>

                <div class="frame-login" >
                  <div class="img-user-login" >
                    <img src="img/password.svg" alt="" style="width:100%;">
                  </div>
                  <div class="frame-input-login" >
                    <input class="input-login" id="re_password" type="password"  name="re_password" placeholder="Nhập lại Mật Khẫu">
                  </div>
                </div>
                <div style="color: white;padding-top:10px;">
                  @if (count($errors)>0)
                      {{$errors->getBag('default')->first('re_password')}}
                  @endif
                </div>

                <div class="space10"></div>

                <div class="frame-login" >
                  <div class="img-user-login" >
                    <img src="img/user-name.svg" alt="" style="width:100%;">
                  </div>
                  <div class="frame-input-login" >
                    <input class="input-login" id="name" type="text"  name="name" placeholder="Họ và Tên">
                  </div>
                </div>
                <div style="color: white;padding-top:10px;">
                  @if (count($errors)>0)
                      {{$errors->getBag('default')->first('name')}}
                  @endif
                </div>

                <div class="space10"></div>

                <div class="frame-login" >
                  <div class="img-user-login" >
                    <img src="img/email.svg" alt="" style="width:100%;">
                  </div>
                  <div class="frame-input-login" >
                    <input class="input-login" id="email" type="email"  name="email" placeholder="Email">
                  </div>
                </div>
                <div style="color: white;padding-top:10px;">
                  @if (count($errors)>0)
                      {{$errors->getBag('default')->first('email')}}
                  @endif
                </div>

                <div class="space10"></div>

                <div class="frame-login" >
                  <div class="img-user-login" >
                    <img src="img/smartphone-call.svg" alt="" style="width:100%;">
                  </div>
                  <div class="frame-input-login" >
                    <input class="input-login" id="phonenumber" type="number"  name="phonenumber" placeholder="Số Điện Thoại">
                  </div>
                </div>
                <div style="color: white;padding-top:10px;">
                  @if (count($errors)>0)
                      {{$errors->getBag('default')->first('phonenumber')}}
                  @endif
                </div>

                <div class="space10"></div>


                <button type="submit" class="btn btn-lg btn-success" style="margin-left:35%;">Đăng Ký</button>
              </div>
              <div class="col-md-1">

              </div>
            </div>

            <div class="space60">
            </div>
          </form>
        </div>
        <div class="col-md-3">

        </div>
      </div>

    </div>
  </div>

@endsection
