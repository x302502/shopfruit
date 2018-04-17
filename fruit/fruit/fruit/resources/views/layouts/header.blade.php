<div class="menu-top" >
  <div class="menu-logo-left font-text">
    <a href="" class="" id="text-logo">FruitDelicious</a>
  </div>
  <div class="menu-logo-right">

    <div class="frame-user">
      <div class="dropdown" style="float:right;">
        @if (Auth::check())
          <div>
            <img class="img-user" src="img/user-white.svg" alt="">
          </div>
          <div class="dropdown-content">
            <p class="dropdown-text">Hi : {{Auth::user()->name}}</p>
            <a href="userinfor/{{Auth::user()->id}}" class="dropdown-text">Cá nhân</a>
            <a href="logout" class="dropdown-text">Đăng xuất</a>
          </div>
        @else
          <div>
            <img class="img-user" src="img/profile.svg" alt="">
          </div>
        @endif
      </div>
    </div>
    <div class="">
      @if (!Auth::check())
        <a href="login">
          <button class="btn-login font-text" type="button" name="button">Đăng nhập</button>
        </a>
        <a href="regis">
          <button class="btn-login font-text" type="button" name="button">Đăng ký /</button>
        </a>
      @endif

    </div>
  </div>
</div>
