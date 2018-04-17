<div class="frame-search-shopcart">
  <form  action="search" method="get" role="search">
    <div class="frame-search">
       <img src="img/loupe.svg" alt="" id="img-search">
       <div id="space"></div>
       <input id="input-search"  type="text" name="key" placeholder="Tìm kiếm...">
   </div>
  </form>

  <a href="cartshop" class="frame-shopcart">
    <img id="img-shopcart" src="img/shopping-cart.svg" alt="">
    <span id="number" style=""> @if(Session::has('cart')){{Session('cart')->totalQty}}@else 0 @endif</span>
  </a>
</div>
