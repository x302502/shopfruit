@extends('master')
@section('body')
  <div class="background-body">
    <div class="content-login">
      <div class="container">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <div class="space50"></div>
          @if (count($errors)>0)
            <div class="alert alert-danger" style="text-align:center;width:40%;margin-left:30%">
              @foreach ($errors->all() as $err)
                {{$err}}<br>
              @endforeach
            </div>
          @endif
          @if (session('thongbao'))
            <div class="alert alert-danger" style="text-align:center;width:40%;margin-left:30%">
              {{session('thongbao')}}
            </div>
          @else
            <div class="space30"></div>
          @endif
          <form method="post" action="userinfor/{{Auth::user()->id}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

            <h3 class="txt-login font-text"><b>Thay đổi thông tin Cá nhân</b></h3>
            <div class="space40">
            </div>
            @if (Auth::check())

            <div class="row">
              <div class="col-md-1">

              </div>
              <div class="col-md-10" style="margin-left:6px;margin-right:6px;">
                <div class="frame-login" >
                  <div class="img-user-login" >
                    <img src="img/profile.svg" alt="" style="width:100%;">
                  </div>
                  <div class="frame-input-login" >
                    <input class="input-login" id="username" type="text"  readonly="readonly"  name="username" value="{{Auth::user()->username}}">
                  </div>
                </div>

                <div class="space10"></div>

                <div class="frame-login" >
                  <div class="img-user-login" >
                    <img src="img/user-name.svg" alt="" style="width:100%;">
                  </div>
                  <div class="frame-input-login" >
                    <input class="input-login" id="name" type="text"name="name" value="{{Auth::user()->name}}">
                  </div>
                </div>

                <div class="space10"></div>

                <div class="frame-login" >
                  <div class="img-user-login" >
                    <img src="img/email.svg" alt="" style="width:100%;">
                  </div>
                  <div class="frame-input-login" >
                    <input class="input-login" id="email" type="email"  name="email" value="{{Auth::user()->email}}">
                  </div>
                </div>

                <div class="space10"></div>

                <div class="frame-login" >
                  <div class="img-user-login" >
                    <img src="img/smartphone-call.svg" alt="" style="width:100%;">
                  </div>
                  <div class="frame-input-login" >
                    <input class="input-login" id="phonenumber"  name="phonenumber" value="{{Auth::user()->phonenumber}}">
                  </div>
                </div>

                <div class="space10"></div>


                <button type="submit" class="btn btn-lg btn-success" style="margin-left:35%;">Lưu</button>
              </div>
              <div class="col-md-1">

              </div>

                          @endif
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
